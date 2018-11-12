<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $name
 * @property int $organizer_id
 * @property int $price_one
 * @property int $kol
 * @property int $price_all
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
            [['name', 'organizer_id', 'price_one', 'kol'], 'required'],
            [['organizer_id', 'provider_id', 'price_one', 'kol', 'price_all'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'price_one' => 'Цена за единицу',
            'kol' => 'Колличество',
            'price_all' => 'Итоговая цена',
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
      $price = $this->price_one * $this->kol;
      if($insert){
        $this->price_all = $price;
        $this->save();
      }

      parent::afterSave($insert, $changedAttributes);
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
}
