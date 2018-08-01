<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_kelas".
 *
 * @property integer $id_kelas
 * @property integer $id_prodi
 * @property string $nama_kelas
 *
 * @property TJadwal[] $tJadwals
 * @property TProdi $idProdi
 * @property TMahasiswa[] $tMahasiswas
 * @property TMataKuliah[] $tMataKuliahs
 * @property TRequest[] $tRequests
 */
class Kelas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_kelas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_prodi', 'nama_kelas'], 'required'],
            [['id_prodi'], 'integer'],
            [['nama_kelas'], 'string', 'max' => 50],
            [['id_prodi'], 'exist', 'skipOnError' => true, 'targetClass' => Prodi::className(), 'targetAttribute' => ['id_prodi' => 'id_prodi']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kelas' => 'Id Kelas',
            'id_prodi' => 'Id Prodi',
            'nama_kelas' => 'Nama Kelas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTJadwals()
    {
        return $this->hasMany(TJadwal::className(), ['id_kelas' => 'id_kelas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProdi()
    {
        return $this->hasOne(Prodi::className(), ['id_prodi' => 'id_prodi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTMahasiswas()
    {
        return $this->hasMany(TMahasiswa::className(), ['id_kelas' => 'id_kelas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTMataKuliahs()
    {
        return $this->hasMany(TMataKuliah::className(), ['id_kelas' => 'id_kelas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTRequests()
    {
        return $this->hasMany(TRequest::className(), ['id_kelas' => 'id_kelas']);
    }
}
