<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stock".
 *
 * @property int $id
 * @property string $name
 * @property int $equipment_id
 * @property int $kol
 *
 * @property EquipmentStock $equipment
 */
class Stock extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stock';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'equipment_id', 'kol'], 'required'],
            [['id', 'equipment_id', 'kol'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['equipment_id'], 'exist', 'skipOnError' => true, 'targetClass' => EquipmentStock::className(), 'targetAttribute' => ['equipment_id' => 'id']],
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
            'equipment_id' => 'Equipment ID',
            'kol' => 'Kol',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipment()
    {
        return $this->hasOne(EquipmentStock::className(), ['id' => 'equipment_id']);
    }
}
