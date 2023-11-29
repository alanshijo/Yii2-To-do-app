<?php

namespace app\models;

use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

class TaskForm extends ActiveRecord
{

    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::class,
                'updatedByAttribute' => false,
            ],
            [
                'class' => TimestampBehavior::class,
                'value' => new Expression('NOW()')
            ]
        ];
    }
    public static function tableName()
    {
        return '{{%task}}';
    }

    public function rules()
    {
        return [
            ['task_name', 'required']
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }
}
