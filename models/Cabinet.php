<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cabinet".
 *
 * @property int $id
 * @property string $name
 * @property int $location_id
 * @property int $orders_id
 *
 * @property Location $location
 * @property Oborudovanie[] $Oborudovanies
 */
class Cabinet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cabinet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'location_id', 'orders_id'], 'required'],
            [['location_id', 'orders_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['location_id'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['location_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'location_id' => 'Location ID',
            'orders_id' => 'Orders ID',
        ];
    }

//    public function getOrders()
//    {
//        return $this->hasMany(Orders::className(), ['id' => 'orders_id']);
//    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
    }

}
