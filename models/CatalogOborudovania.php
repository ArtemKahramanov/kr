<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "catalog_oborudovania".
 *
 * @property int $id
 * @property int $groups_id
 * @property string $name
 *
 * @property Groups $groups
 * @property Oborudovanie[] $oborudovanies
 */
class CatalogOborudovania extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'catalog_oborudovania';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['groups_id', 'name'], 'required'],
            [['groups_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['groups_id'], 'exist', 'skipOnError' => true, 'targetClass' => Groups::className(), 'targetAttribute' => ['groups_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'groups_id' => 'Группа',
            'name' => 'Название',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasOne(Groups::className(), ['id' => 'groups_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOborudovanies()
    {
        return $this->hasMany(Oborudovanie::className(), ['catalog_oborudovania_id' => 'id']);
    }
}
