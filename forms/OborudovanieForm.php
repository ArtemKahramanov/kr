<?php

namespace app\forms;

use Yii;
use yii\base\Model;


class OborudovanieForm extends Model
{
    public $cabinet_id;
    public $location;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['cabinet_id', 'location'], 'required'],
            [['cabinet_id'], 'integer'],
            [['location'], 'string', 'max' => 125],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'location' => 'Название Отделения',
            'cabinet_id' => 'Номер кабинета',
        ];
    }

//    public function getLocation()
//    {
//
//    }
}
