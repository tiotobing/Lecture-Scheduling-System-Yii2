<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_jadwal".
 *
 * @property integer $id_jadwal
 * @property integer $id_mk
 * @property integer $id_kelas
 * @property integer $id_ruangan
 * @property string $jam_selesai
 * @property string $jam_mulai
 * @property string $hari
 * @property integer $sesi
 * @property integer $week
 * @property string $tanggal
 *
 * @property TMataKuliah $idMk
 * @property TKelas $idKelas
 * @property TRuangan $idRuangan
 */
class Jadwal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_jadwal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_mk', 'id_kelas', 'id_ruangan', 'jam_selesai', 'jam_mulai', 'hari', 'sesi', 'week'], 'required'],
            [[  'id_ruangan', 'sesi', 'week'], 'integer'],
            [['id_mk','jam_selesai', 'id_kelas','jam_mulai', 'tanggal'], 'safe'],
            [['hari'], 'string', 'max' => 20],
            [['id_mk'], 'exist', 'skipOnError' => true, 'targetClass' => MataKuliah::className(), 'targetAttribute' => ['id_mk' => 'id_mk']],
            [['id_kelas'], 'exist', 'skipOnError' => true, 'targetClass' =>  Kelas::className(), 'targetAttribute' => ['id_kelas' => 'id_kelas']],
            [['id_ruangan'], 'exist', 'skipOnError' => true, 'targetClass' =>  Ruangan::className(), 'targetAttribute' => ['id_ruangan' => 'id_ruangan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_jadwal' => 'Id Jadwal',
            'id_mk' => 'Id Mk',
            'id_kelas' => 'Id Kelas',
            'id_ruangan' => 'Id Ruangan',
            'jam_selesai' => 'Jam Selesai',
            'jam_mulai' => 'Jam Mulai',
            'hari' => 'Hari',
            'sesi' => 'Sesi',
            'week' => 'Week',
            'tanggal' => 'Tanggal',
        ];
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
    public function getIdRuangan()
    {
        return $this->hasOne(Ruangan::className(), ['id_ruangan' => 'id_ruangan']);
    }
}
