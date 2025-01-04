<?php

namespace backend\modules\profilemanager\models;

use common\models\User;
use Yii;

class ProfileUser extends User
{

    const SCENARIO_UPDATE = 'update';
    const SCENARIO_CHANGE_PASSWORD = 'change_password';

    public function rules()
    {
        return [
            [['username'], 'required'],
            ['username', 'unique'],
            [['username'], 'string', 'max' => 255],

        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => "Login",
        ];
    }

    public function scenarios(): array
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_UPDATE] = ['username'];
        $scenarios[self::SCENARIO_CHANGE_PASSWORD] = ['password_hash'];
        return $scenarios;
    }

    /**
     * @return \backend\modules\profilemanager\models\ProfileUser|false
     */
    public static function getUserModel()
    {
        $model = static::findOne(Yii::$app->user->getId());
        if ($model == null) {
            return false;
        }

        $model->scenario = self::SCENARIO_UPDATE;
        return $model;
    }

}