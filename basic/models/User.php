<?php

namespace app\models;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

//public $confirmPassword;
//public $verifyCode;

	public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password',/*'confirmPassword','email', 'verifyCode'*/], 'required'],
			//['username', 'unique'],
			//['confirmPassword', 'compare', 'compareAttribute' => 'password'],
			//[['confirmPassword'], 'safe'],
			//['email', 'email'],
			//['verifyCode', 'captcha'],
        ];
    }
	
	

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token'=>$token]);
    }

    /**
     * Finds user by username
     
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username'=>$username]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

   
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

   
    public function validatePassword($password)
    {
        return \Yii::$app->getSecurity()->validatePassword($password,$this->password);
    }
	public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }
}
