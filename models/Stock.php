<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stock".
 *
 * @property int $id
 * @property string $name
 * @property int $kol
 *
 * @property EquipmentStock $equipment
 */
class Stock extends \yii\db\ActiveRecord
{
    public $equipmentCount;
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
            [['id', 'name', 'kol'], 'required'],
            [['id', 'kol'], 'integer'],
            [['name', 'ed'], 'string', 'max' => 255],
            [['id'], 'unique'],
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
            'ed' => 'Единица измерения',
            'kol' => 'Кол-во',
        ];
    }

    public function getEquipmentStock(){
        return $this->hasMany(EquipmentStock::className(), ['stock_id'=>'id']);
    }

    public function getEquipmentCount($model){
        $oborudovanie = EquipmentStock::find()->where(['stock_id' => $model->id])->count();
        if($oborudovanie < $model->kol){
            return "Необходимо докупить " . ($model->kol - $oborudovanie) . ' товара(ов)';
        }else{
            return "В наличии";
        }
    }

}
