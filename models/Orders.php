<?php

namespace app\models;

use Yii;
/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int $catalog_oborudovania_id
 * @property int $price_one
 * @property int $kol
 * @property int $organizer_id
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'catalog_oborudovania_id', 'cabinet_id', 'location_id'], 'required'],
            [['name'], 'string', 'min' => 3],
            [['catalog_oborudovania_id', 'price_one', 'kol', 'organizer_id', 'cabinet_id', 'location_id'], 'integer'],
            [['created_at', 'status'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'catalog_oborudovania_id' => 'Каталог оборудования',
            'price_one' => 'Цена за единицу',
            'kol' => 'Кол-во',
            'status' => 'Статус',
            'organizer_id' => 'Организатор',
            'cabinet_id' => 'Кабинет',
            'location_id' => 'Отделаение',
            'price_all' => 'Итого',
            'created_at' => 'Дата добавления',
        ];
    }
    public function getCatalogOborudovania()
    {
        return $this->hasOne(CatalogOborudovania::className(), ['id' => 'catalog_oborudovania_id']);
    }

    public function getOrganizer()
    {
        return $this->hasOne(Organizer::className(), ['id' => 'organizer_id']);
    }

    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
    }
}
