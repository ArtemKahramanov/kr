<?php

namespace app\controllers;

use app\forms\OborudovanieForm;
use Yii;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use app\models\Oborudovanie;
use app\models\Cabinet;
use yii\web\NotFoundHttpException;


class OborudovanieController extends Controller
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

    public function actionIndex($cabinet, $location)
    {
        $query = Oborudovanie::find()->where(['cabinet_id' => $cabinet, 'location_id' => $location]);
        if (empty($query)) {
            throw new NotFoundHttpException('Кабинет не найден');
        }
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 25,
            ],
            'sort' => [
                'defaultOrder' => []
            ],
        ]);

        $query = $query->all();

        return $this->render('index', [
            'provider' => $provider,
            'query' => $query,
        ]);
    }
}
