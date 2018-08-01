<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DosenStaff;

/**
 * DosenStaffSearch represents the model behind the search form about `app\models\DosenStaff`.
 */
class DosenStaffSearch extends DosenStaff
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_dosen_staff', 'id_user', 'jumlah_sks'], 'integer'],
            [['nama_lengkap', 'nidn', 'jenis_kelamin', 'email'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = DosenStaff::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_dosen_staff' => $this->id_dosen_staff,
            'id_user' => $this->id_user,
            'jumlah_sks' => $this->jumlah_sks,
        ]);

        $query->andFilterWhere(['like', 'nama_lengkap', $this->nama_lengkap])
            ->andFilterWhere(['like', 'nidn', $this->nidn])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
