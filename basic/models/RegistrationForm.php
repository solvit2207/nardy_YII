<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class RegistrationForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $confirmPassword;
	public $authKey;
	public $accessToken;
	
    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, password are required
            [['username', 'email', 'password'], 'required'],
            
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'unique', 'targetClass' => 'app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            // email has to be a valid email address
            ['email', 'email'],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'unique', 'targetClass' => 'app\models\User', 'message' => 'This email address has already been taken.'],
            
            ['confirmPassword', 'compare', 'compareAttribute' => 'password'],
            ['password', 'string', 'min' => 3],
            ['confirmPassword','safe'], 
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    
     public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
			$user->password = $this->password;
			$user->authKey= $this->username.'key';
			$user->accessToken= $this->username.'token';
				Yii::$app->mailer->compose()
                ->setTo($user->email)
                ->setFrom('admin@nardy.ua')
                ->setSubject('Registration')
                ->setTextBody('Your-name: '.$user->username.'        Your-password: '.$user->password)
                ->send();
            $user->password=Yii::$app->getSecurity()->generatePasswordHash($user->password);
            if ($user->save($runValidation = false)) {
                return $user;
            } 
        }
        return null;
    }
}
