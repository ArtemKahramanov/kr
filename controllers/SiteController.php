<?php

namespace app\controllers;

use app\forms\OborudovanieForm;
use app\models\CatalogOborudovania;
use app\models\Location;
use app\models\NewOrder;
use app\models\Orders;
use app\models\WriteOff;
use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Oborudovanie;
use app\models\Organizer;
use app\models\Provider;
use app\models\Cabinet;
use app\models\Groups;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;


class SiteController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $rows = (new \yii\db\Query())
            ->select(['organizer.name'])
            ->from('organizer')
            ->innerJoin('groups', 'groups.organizer_id = organizer.id')
//            ->where(['organizer.id' => 3])
//            ->
            ->all();

        return $this->render('index', [
            'rows' => $rows,
        ]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionGroups()
    {
        $query = Groups::find();
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 7,
            ],
            'sort' => [
                'defaultOrder' => []
            ],
        ]);

        return $this->render('groups', [
            'provider' => $provider,
            'query' => $query,
        ]);
    }

    public function actionOborudovanie()
    {
        $model = new OborudovanieForm();
        if($model->load(Yii::$app->request->post())) {
            return Yii::$app->response->redirect(['/oborudovanie/index', 'cabinet' => $model->cabinet_id, 'location' => $model->location]);
        }
        return $this->render('oborudovanie', [
            'model' => $model,
        ]);
    }

    public function actionLocation()
    {
        $query = Location::find();
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 7,
            ],
            'sort' => [
                'defaultOrder' => []
            ],
        ]);

        $query = $query->all();

        return $this->render('location', [
            'provider' => $provider,
            'query' => $query,
        ]);
    }

    public function actionCabinet()
    {
        $query = Cabinet::find();
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 7,
            ],
            'sort' => [
                'defaultOrder' => []
            ],
        ]);

        $query = $query->all();

        return $this->render('cabinet', [
            'provider' => $provider,
            'query' => $query,
        ]);
    }

    public function actionProvider()
    {
        $query = Provider::find();
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 7,
            ],
            'sort' => [
                'defaultOrder' => []
            ],
        ]);

        $query = $query->all();

        return $this->render('provider', [
            'provider' => $provider,
            'query' => $query,
        ]);
    }

    public function actionOrders()
    {
        $model = new Orders();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Заказ добавлен!');
            return $this->refresh();
        }

        return $this->render('orders', [
            'model' => $model,
        ]);
    }

    public function actionWriteOff()
    {
        $claim = new WriteOff();
        if ($claim->load(Yii::$app->request->post())){
            $oborudovanie = Oborudovanie::find()->where(['number' => $claim->number])->one();
            if(!$oborudovanie){
                throw new NotFoundHttpException('Оборудование не найдено');
            }
            $claim->oborudovanie_id = $oborudovanie->id;
            $claim->save();
            Yii::$app->session->setFlash('success', 'Заявка отправленна');
            return $this->refresh();
        }
        $oborudovanie = Oborudovanie::find()->joinWith('cabinet')->all();
        return $this->render('write-off', [
            'claim' => $claim,
            'oborudovanie' => $oborudovanie,
        ]);
    }

    public function actionCatalog($q = null, $id = null)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query();
            $query->select('id, name AS text')
                ->from('catalog_oborudovania')
                ->where(['like', 'name', $q])
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        } elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => CatalogOborudovania::find($id)->name];
        }
        return $out;
    }

    public function actionOrganizer()
    {
        $query = Organizer::find();

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 7,
            ],
            'sort' => [
                'defaultOrder' => []
            ],
        ]);

        return $this->render('organizer', [
            'provider' => $provider,
        ]);
    }
}
