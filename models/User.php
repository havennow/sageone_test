<?php

namespace app\models;


use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;

class User extends \yii\db\ActiveRecord  implements IdentityInterface
{
    public $authKey;
    public $accessToken;



    public static function tableName()
    {
        return 'sage_user';
    }
   
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username'], 'number'],
            [['name'], 'safe'],
            [['password'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [

            'username' => 'Usuário',
            'password' => 'Senha',
            'name' => 'Nome',
        ];
    }


    public static function findIdentity($id)
    {
		return static::findOne($id);

    }

    /**
     * @inheritdoc
     */


    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
	    return static::findOne(['username' => $username]);

    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
	    return $this->getPrimaryKey();

    }

    public function getNome()
    {
      return $this->name();

    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
	    return $this->getAuthKey() === $authKey;

    }


	public function generateAuthKey()

	    {

	        $this->auth_key = Security::generateRandomKey();

	    }
	    public function generatePasswordResetToken()

	       {

	           $this->password_reset_token = Security::generateRandomKey() . '_' . time();

	       }

	       public function removePasswordResetToken()

	       {

	           $this->password_reset_token = null;

	       }
		   public static function findIdentityByAccessToken($token, $type = null)

		      {

		            return static::findOne(['access_token' => $token]);

		      }

		   public static function findByPasswordResetToken($token)

		       {

		           $expire = \Yii::$app->params['user.passwordResetTokenExpire'];

		           $parts = explode('_', $token);

		           $timestamp = (int) end($parts);

		           if ($timestamp + $expire < time()) {

		               // token expired

		               return null;

		           }



		           return static::findOne([

		               'password_reset_token' => $token

		           ]);

		       }



    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
