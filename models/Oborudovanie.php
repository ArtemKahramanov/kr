<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "oborudovanie".
 *
 * @property int $id
 * @property int $catalog_oborudovania_id
 * @property string $number
 * @property string $retired
 * @property int $cabinet_id
 *
 * @property Cabinet $cabinet
 * @property catalog $catalog
 */
class Oborudovanie extends \yii\db\ActiveRecord
{
    public $date_end;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'oborudovanie';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['catalog_oborudovania_id', 'number', 'cabinet_id', 'start_operation'], 'required'],
            [['catalog_oborudovania_id', 'location_id'], 'integer'],
            [['number'], 'unique'],
            [['start_operation', 'cabinet_id'], 'safe'],
            [['number'], 'string', 'max' => 255],
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
            'catalog_oborudovania_id' => 'Каталог оборудования',
            'number' => 'Номер',
            'name' => 'Название',
            'retired' => 'Необходимо списать',
            'cabinet_id' => 'Кабинет',
            'location_id' => 'Отделение',
            'date_end' => 'Планируемая дата списания',
            'start_operation' => 'Дата ввода в эксплуатацию',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogOborudovania()
    {
        return $this->hasOne(CatalogOborudovania::className(), ['id' => 'catalog_oborudovania_id']);
    }

}
