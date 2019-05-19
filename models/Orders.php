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
            [['catalog_oborudovania_id', 'price_one', 'kol', 'organizer_id'], 'required'],
            [['catalog_oborudovania_id', 'price_one', 'kol', 'organizer_id'], 'integer'],
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
            'organizer_id' => 'Организатор',
            'price_all' => 'Итого'
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
}
