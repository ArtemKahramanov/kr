<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "write_off".
 *
 * @property int $id
 * @property string $name
 * @property int $cabinet_id
 * @property int $location_id
 * @property int $oborudovanie_id
 *
 * @property Cabinet $cabinet
 * @property Location $location
 */
class WriteOff extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'write_off';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'cabinet_id', 'location_id', 'oborudovanie_id'], 'required'],
            [['cabinet_id', 'location_id', 'oborudovanie_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['cabinet_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cabinet::className(), 'targetAttribute' => ['cabinet_id' => 'id']],
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
            'cabinet_id' => 'Cabinet ID',
            'location_id' => 'Location ID',
            'oborudovanie_id' => 'Oborudovanie ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabinet()
    {
        return $this->hasOne(Cabinet::className(), ['id' => 'cabinet_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
    }
}
