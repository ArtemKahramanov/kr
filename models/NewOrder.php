<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "new_order".
 *
 * @property int $id
 * @property string $name
 * @property int $catalog_oborudovania_id
 * @property int $kol
 *
 * @property CatalogOborudovania $catalogOborudovania
 */
class NewOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'new_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'catalog_oborudovania_id', 'kol'], 'required'],
            [['catalog_oborudovania_id', 'kol'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['catalog_oborudovania_id'], 'exist', 'skipOnError' => true, 'targetClass' => CatalogOborudovania::className(), 'targetAttribute' => ['catalog_oborudovania_id' => 'id']],
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
            'catalog_oborudovania_id' => 'Категория',
            'kol' => 'Количество',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogOborudovania()
    {
        return $this->hasOne(CatalogOborudovania::className(), ['id' => 'catalog_oborudovania_id']);
    }
}
