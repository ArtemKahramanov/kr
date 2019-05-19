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
            [['number', 'cabinet_id', 'location_id', 'oborudovanie_id'], 'required'],
            [['cabinet_id', 'location_id', 'oborudovanie_id'], 'integer'],
            [['number'], 'string', 'max' => 255],
            [['cabinet_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cabinet::className(), 'targetAttribute' => ['cabinet_id' => 'id']],
            [['location_id'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['location_id' => 'id']],
            [['created_at', 'organizer_id'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Серийный номер',
            'cabinet_id' => 'Кабинет',
            'location_id' => 'Отделение',
            'created_at' => 'Дата добавления',
            'oborudovanie_id' => 'Оборудование',
            'organizer_id' => 'Ораганизатор',
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

    public function getOrganizer()
    {
        return $this->hasOne(Organizer::className(), ['id' => 'organizer_id']);
    }
}
