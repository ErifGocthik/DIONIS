<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class SignupForm extends ActiveRecord
{
    public $username;
    public $full_name;
    public $email;
    public $phone_number;
    public $password;
    public $password_repeat;
//    public $rememberMe = true;

//    private $_user = false;

    /**
     * This is the model class for table "user".
     *
     * @property int $id
     * @property string $username
     * @property string $full_name
     * @property string|null $email
     * @property string $phone_number
     * @property string $password
     * @property int $role
     * @property int $ban
     */

    public static function tableName()
    {
        return 'user';
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'full_name', 'phone_number', 'password'], 'required'],
            [['role', 'ban'], 'safe'],
            [['password', 'password_repeat'], 'string', 'min'=>6],
            [['username', 'email', 'password'], 'string', 'max' => 256],
            ['email', 'email', 'message' => 'Проверьте наличие "@" и "." в строке'],
            [['full_name'], 'string', 'max' => 512],
            [['phone_number'], 'string', 'max' => 128],
            ['password', 'compare', 'compareAttribute'=>'password_repeat'],
            ['role', 'default', 'value'=>1],
            ['ban', 'default', 'value'=>0],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Пользователь'),
            'full_name' => Yii::t('app', 'Ф.И.О.'),
            'password' => Yii::t('app', 'Пароль'),
            'password_repeat' => Yii::t('app', 'Повтор пароля'),
            'phone_number' => Yii::t('app', 'Номер телефона'),
        ];
    }

    /**
     * @return mixed
     */
    public function saveUser()
    {
        $user = new User();

        if(!$this->validate())
        {
            Yii::$app->session->setFlash('danger', 'Форма не валидна, проверьте данные и попробуйте еще раз');
            return $this->refresh();
        }

        $user -> username = $this->username;
        $user -> full_name = $this->full_name;
        $user -> email = $this->email;
        $user -> password = Yii::$app->security->generatePasswordHash($this->password);
        $user -> phone_number = $this->phone_number;

        return $user->save()?$user:null;
    }
}