<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_mahasiswa".
 *
 * @property integer $id_mahasiswa
 * @property integer $id_user
 * @property string $nim
 * @property string $nama_lengkap
 * @property string $prodi
 * @property integer $id_kelas
 *
 * @property TUser $idUser
 * @property TKelas $idKelas
 */
class Mahasiswa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_mahasiswa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'nim', 'nama_lengkap',  'id_kelas'], 'required'],
            [['id_user', 'id_kelas'], 'integer'],
            [['nim'], 'string', 'max' => 15],
            [['nama_lengkap'], 'string', 'max' => 50],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id_user']],
            [['id_kelas'], 'exist', 'skipOnError' => true, 'targetClass' => Kelas::className(), 'targetAttribute' => ['id_kelas' => 'id_kelas']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_mahasiswa' => 'Id Mahasiswa',
            'id_user' => 'Id User',
            'nim' => 'Nim',
            'nama_lengkap' => 'Nama Lengkap',
            //'prodi' => 'Prodi',
            'id_kelas' => 'Id Kelas',
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
    public function getIdKelas()
    {
        return $this->hasOne( Kelas::className(), ['id_kelas' => 'id_kelas']);
    }
}
