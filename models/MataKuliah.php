<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_mata_kuliah".
 *
 * @property integer $id_mk
 * @property string $kode_mk
 * @property integer $id_kelas
 * @property string $nama_mk
 * @property integer $id_dosen
 *
 * @property TJadwal[] $tJadwals
 * @property TKelas $idKelas
 * @property TDosenStaff $idDosen
 * @property TRequest[] $tRequests
 */
class MataKuliah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_mata_kuliah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_mk', 'id_kelas', 'nama_mk', 'id_dosen'], 'required'],
            [['id_kelas', 'id_dosen'], 'integer'],
            [['kode_mk'], 'string', 'max' => 30],
            [['nama_mk'], 'string', 'max' => 50],
            [['id_kelas'], 'exist', 'skipOnError' => true, 'targetClass' =>  Kelas::className(), 'targetAttribute' => ['id_kelas' => 'id_kelas']],
            [['id_dosen'], 'exist', 'skipOnError' => true, 'targetClass' =>  DosenStaff::className(), 'targetAttribute' => ['id_dosen' => 'id_dosen_staff']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_mk' => 'Id Mk',
            'kode_mk' => 'Kode Mk',
            'id_kelas' => 'Id Kelas',
            'nama_mk' => 'Nama Mk',
            'id_dosen' => 'Id Dosen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTJadwals()
    {
        return $this->hasMany(Jadwal::className(), ['id_mk' => 'id_mk']);
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
    public function getIdDosen()
    {
        return $this->hasOne(DosenStaff::className(), ['id_dosen_staff' => 'id_dosen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTRequests()
    {
        return $this->hasMany(Request::className(), ['id_mk' => 'id_mk']);
    }
}
