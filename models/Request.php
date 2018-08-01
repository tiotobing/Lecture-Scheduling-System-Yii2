<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_request".
 *
 * @property integer $id_request
 * @property string $tanggal_req
 * @property integer $id_user
 * @property integer $id_mk
 * @property integer $id_kelas
 * @property integer $id_ruangan
 * @property string $hari
 * @property string $tanggal
 * @property string $alasan
 * @property string $status
 *
 * @property TRuangan $idRuangan
 * @property TMataKuliah $idMk
 * @property TKelas $idKelas
 * @property TUser $idUser
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_request';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tanggal_req', 'tanggal'], 'safe'],
            [['id_user', 'id_mk', 'id_kelas', 'id_ruangan', 'hari', 'alasan'], 'required'],
            [['id_user', 'id_mk', 'id_kelas', 'id_ruangan'], 'integer'],
            [['hari', 'alasan'], 'string'],
            [['status'], 'string', 'max' => 50],
            [['id_ruangan'], 'exist', 'skipOnError' => true, 'targetClass' => Ruangan::className(), 'targetAttribute' => ['id_ruangan' => 'id_ruangan']],
            [['id_mk'], 'exist', 'skipOnError' => true, 'targetClass' => MataKuliah::className(), 'targetAttribute' => ['id_mk' => 'id_mk']],
            [['id_kelas'], 'exist', 'skipOnError' => true, 'targetClass' => Kelas::className(), 'targetAttribute' => ['id_kelas' => 'id_kelas']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id_user']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_request' => 'Id Request',
            'tanggal_req' => 'Tanggal Req',
            'id_user' => 'Id User',
            'id_mk' => 'Id Mk',
            'id_kelas' => 'Id Kelas',
            'id_ruangan' => 'Id Ruangan',
            'hari' => 'Hari',
            'tanggal' => 'Tanggal',
            'alasan' => 'Alasan',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRuangan()
    {
        return $this->hasOne(Ruangan::className(), ['id_ruangan' => 'id_ruangan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMk()
    {
        return $this->hasOne(MataKuliah::className(), ['id_mk' => 'id_mk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKelas()
    {
        return $this->hasOne(Kelas::className(), ['id_kelas' => 'id_kelas']);
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
   public function getIdDosenStaff()
   {
       return $this->hasOne(DosenStaff::className(), ['id_user' => 'id_user']);
   }

}
