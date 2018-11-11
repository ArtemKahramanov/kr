<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipment_stock".
 *
 * @property int $id
 * @property string $name
 * @property int $organizer_id
 * @property string $date_purchase
 * @property int $life
 * @property string $data_end
 * @property int $kol
 *
 * @property Organizer $organizer
 * @property Stock[] $stocks
 */
class EquipmentStock extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipment_stock';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'organizer_id', 'date_purchase', 'life', 'data_end', 'kol'], 'required'],
            [['organizer_id', 'provider_id', 'life', 'kol'], 'integer'],
            [['date_purchase', 'data_end'], 'default', 'value'=>('Y-m-d')],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['organizer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organizer::className(), 'targetAttribute' => ['organizer_id' => 'id']],
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
            'organizer_id' => 'Организатор',
            'provider_id' => 'Поставщик',
            'date_purchase' => 'Дата покупки',
            'life' => 'Срок службы',
            'data_end' => 'Дата окончания срока службы',
            'kol' => 'Колличество',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizer()
    {
        return $this->hasOne(Organizer::className(), ['id' => 'organizer_id']);
    }

    public function getProvider()
    {
        return $this->hasOne(Provider::className(), ['id' => 'provider_id']);
    }

    public function getStock()
    {
        return $this->hasOne(Stock::className(), ['equipment_id' => 'id']);
    }
}
