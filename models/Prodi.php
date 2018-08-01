<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_prodi".
 *
 * @property integer $id_prodi
 * @property string $nama_prodi
 *
 * @property TKelas[] $tKelas
 */
class Prodi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_prodi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_prodi'], 'required'],
            [['nama_prodi'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_prodi' => 'Id Prodi',
            'nama_prodi' => 'Nama Prodi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTKelas()
    {
        return $this->hasMany(TKelas::className(), ['id_prodi' => 'id_prodi']);
    }


}
