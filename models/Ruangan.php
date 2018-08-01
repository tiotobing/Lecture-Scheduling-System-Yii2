<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_ruangan".
 *
 * @property integer $id_ruangan
 * @property string $nama_ruangan
 * @property integer $kapasitas
 * @property string $status
 * @property integer $id_bangunan
 *
 * @property TJadwal[] $tJadwals
 * @property TRequest[] $tRequests
 * @property TBangunan $idBangunan
 */
class Ruangan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_ruangan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_ruangan', 'kapasitas', 'status', 'id_bangunan'], 'required'],
            [['kapasitas', 'id_bangunan'], 'integer'],
            [['nama_ruangan'], 'string', 'max' => 30],
            [['status'], 'string', 'max' => 20],
            [['id_bangunan'], 'exist', 'skipOnError' => true, 'targetClass' => Bangunan::className(), 'targetAttribute' => ['id_bangunan' => 'id_bangunan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ruangan' => 'Id Ruangan',
            'nama_ruangan' => 'Nama Ruangan',
            'kapasitas' => 'Kapasitas',
            'status' => 'Status',
            'id_bangunan' => 'Id Bangunan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTJadwals()
    {
        return $this->hasMany(TJadwal::className(), ['id_ruangan' => 'id_ruangan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTRequests()
    {
        return $this->hasMany(TRequest::className(), ['id_ruangan' => 'id_ruangan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBangunan()
    {
        return $this->hasOne(Bangunan::className(), ['id_bangunan' => 'id_bangunan']);
    }
}
