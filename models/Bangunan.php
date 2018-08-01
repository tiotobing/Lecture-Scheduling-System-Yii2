<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_bangunan".
 *
 * @property integer $id_bangunan
 * @property string $nama_bangunan
 *
 * @property TRuangan[] $tRuangans
 */
class Bangunan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_bangunan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_bangunan'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_bangunan' => 'Id Bangunan',
            'nama_bangunan' => 'Nama Bangunan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTRuangans()
    {
        return $this->hasMany(TRuangan::className(), ['id_bangunan' => 'id_bangunan']);
    }
}
