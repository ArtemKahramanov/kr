<?php

namespace app\modules\admin\controllers;
use app\models\Oborudovanie;
use app\models\Cabinet;
use app\models\Groups;
use app\models\Location;
use app\models\CatalogOborudovania;
use app\models\Orders;
use app\models\Organizer;
use app\models\Provider;
use yii\web\HttpException;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class FillController extends AdminController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        \Yii::$app->db->transaction(function() {
            $count = 15;
            for ($i = 0; $i <= $count; $i++) {
                $loc = new Location;
                $loc->name = "Цех " . $i;
                if (!$loc->save()) {
                    throw new HttpException(500, 'error');
                }

                $org = new Organizer;
                $org->name = "Петров " . $i;
                if (!$org->save()) {
                    throw new HttpException(500, 'error');
                }

                $provider = new Provider;
                $provider->name = "Иванов " . $i;
                if (!$provider->save()) {
                    $provider->getErrors();
                }

                $group = new Groups;
                $group->name = "Техника " . $i;
                $group->provider_id = $provider->id;
                $group->organizer_id = $org->id;
                if (!$group->save()) {
                    throw new HttpException(500, 'error');
                }

                $ob = new CatalogOborudovania;
                $ob->groups_id = $group->id;
                $ob->name = "Техника " . $i;
                if (!$ob->save()) {
                    throw new HttpException(500, 'error');
                }

                $orders = new Orders;
                $orders->catalog_oborudovania_id = $ob->id;
                $orders->price_one = $i * $i;
                $orders->kol = $i;
                $orders->organizer_id = $org->id;
                if (!$orders->save()) {
                    throw new HttpException(500, 'error');
                }

                $cab = new Cabinet;
                $cab->name = "Номер " . ($i + $i);
                $cab->location_id = $loc->id;
                $cab->orders_id = $orders->id;
                if (!$cab->save()) {
                    throw new HttpException(500, 'error');
                }

                $eq = new Oborudovanie;
                $eq->catalog_oborudovania_id = $ob->id;
                $eq->number = "номер " . $i;
                $eq->retired = '2018-02-21';
                $eq->cabinet_id = $cab->id;
                if (!$eq->save()) {
                    throw new HttpException(500, 'error');
                }
            }
        });
        \Yii::$app->session->addFlash('success', 'Выполнение прошло успешно');
        return $this->render('/default/index');
    }
}
