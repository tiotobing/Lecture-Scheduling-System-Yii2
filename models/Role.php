<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_role".
 *
 * @property integer $id_role
 * @property string $role_name
 *
 * @property TUser[] $tUsers
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_name'], 'required'],
            [['role_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_role' => 'Id Role',
            'role_name' => 'Role Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTUsers()
    {
        return $this->hasMany(TUser::className(), ['id_role' => 'id_role']);
    }
}
