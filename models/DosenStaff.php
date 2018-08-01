<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_dosen_staff".
 *
 * @property integer $id_dosen_staff
 * @property integer $id_user
 * @property string $nama_lengkap
 * @property string $nidn
 * @property string $jenis_kelamin
 * @property string $email
 * @property integer $jumlah_sks
 *
 * @property TUser $idUser
 * @property TMataKuliah[] $tMataKuliahs
 */
class DosenStaff extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_dosen_staff';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'nama_lengkap', 'nidn', 'jenis_kelamin', 'email', 'jumlah_sks'], 'required'],
            [['id_user', 'jumlah_sks'], 'integer'],
            [['nama_lengkap'], 'string', 'max' => 50],
            [['nidn'], 'string', 'max' => 32],
            [['jenis_kelamin'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 25],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id_user']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_dosen_staff' => 'Id Dosen Staff',
            'id_user' => 'Id User',
            'nama_lengkap' => 'Nama Lengkap',
            'nidn' => 'Nidn',
            'jenis_kelamin' => 'Jenis Kelamin',
            'email' => 'Email',
            'jumlah_sks' => 'Jumlah Sks',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id_user' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTMataKuliahs()
    {
        return $this->hasMany(TMataKuliah::className(), ['id_dosen' => 'id_dosen_staff']);
    }
}
