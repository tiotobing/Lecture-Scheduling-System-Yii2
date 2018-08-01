<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_user".
 *
 * @property integer $id_user
 * @property string $username
 * @property string $password
 * @property integer $id_role
 *
 * @property TDosenStaff[] $tDosenStaff
 * @property TMahasiswa[] $tMahasiswas
 * @property TRole $idRole
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'id_role'], 'required'],
            [['id_role'], 'integer'],
            [['username', 'password'], 'string', 'max' => 30],
            [['id_role'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['id_role' => 'id_role']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'username' => 'Username',
            'password' => 'Password',
            'id_role' => 'Id Role',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTDosenStaff()
    {
        return $this->hasMany(DosenStaff::className(), ['id_user' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTMahasiswas()
    {
        return $this->hasMany(Mahasiswa::className(), ['id_user' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRole()
    {
        return $this->hasOne(Role::className(), ['id_role' => 'id_role']);
    }



        // ===============  function untuk menghubungkan username dan password di DB

        public static function findIdentity($id)
        {
          return static::findOne($id);
        }

        public static function findIdentityByAccessToken($token,$type = null)
        {
          return static::findOne(['access_token' => $token]);
        }

        public function getId()
        {
          return $this->id_user;
        }

        public function getAuthKey()
        {
          return $this->auth_key;
        }

        public function validateAuthKey($authKey)
        {
          return $this->getAuthKey() === $authKey;
        }

        // mem VALIDASI agar username dan Password bisa connect dari DATABASE

        public static function findByUsername($username)
        {
         return static::findOne(['username' => $username]);
        }


        // >>>  Validasi Password Setelah dilakukan HASH Password

        public function validatePassword($password)
        {
          if(is_null ($this->password))
            return false;
          // return $this->password === $password;
          return Yii::$app->getSecurity()->validatePassword($password, $this->password);
        }


        // ===================================================================//

        // >>>  fungsi untuk membuat HASH Password

        public function beforeSave($insert)
        {
         if(!parent::beforeSave($insert)){
           return false;
         }
         $this->auth_key = \Yii::$app->security->generateRandomString();
         $this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
         return true;
        }


        // ==*===*===*===*===*===*====*===*===*====*===*====*===*===* //






}
