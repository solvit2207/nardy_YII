<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "registration".
 *
 * @property integer $id
 * @property string $name
 * @property string $password
 * @property string $email
 */
class Registration extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'registration';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'password', 'email'], 'required'],
            [['name'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'password' => 'Password',
            'email' => 'Email',
        ];
    }
}
