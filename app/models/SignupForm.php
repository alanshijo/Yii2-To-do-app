<?php

namespace app\models;

use yii\base\Model;

class SignupForm extends Model
{
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $password_confirm;

    public $verifyCode;

    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'password', 'password_confirm'], 'required'],
            ['email', 'email'],
            ['password', 'string', 'min' => 6],
            ['password_confirm', 'compare', 'compareAttribute' => 'password'],
            ['verifyCode', 'captcha', 'message' => 'Captcha is invalid']
        ];
    }

    public function attributeLabels()
    {
        return [
            'password_confirm' => 'Confirm Password',
            'verifyCode' => 'Captcha'
        ];
    }

    public function signup()
    {
        $user = new User;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->password = $user->hashPassword($this->password);
        $user->auth_key = $user->generateAuthKey();
        if ($this->validate()) {
            if ($user->save()) {
                return true;
            }
        }

        return false;
    }
}
