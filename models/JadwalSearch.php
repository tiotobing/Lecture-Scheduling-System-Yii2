<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Jadwal;

/**
 * JadwalSearch represents the model behind the search form about `app\models\Jadwal`.
 */
class JadwalSearch extends Jadwal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_jadwal',  'id_ruangan', 'sesi', 'week'], 'integer'],
            [['jam_selesai','id_mk', 'jam_mulai', 'id_kelas', 'hari','d1' , 'd2' ,'tanggal'], 'safe'],
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
        $query = Jadwal::find();

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
            'id_jadwal' => $this->id_jadwal,
            'id_mk' => $this->id_mk,
            'id_kelas' => $this->id_kelas,
            'id_ruangan' => $this->id_ruangan,
            'jam_selesai' => $this->jam_selesai,
            'jam_mulai' => $this->jam_mulai,
            'sesi' => $this->sesi,
            'week' => $this->week,
            'tanggal' => $this->tanggal,
        ]);

        $query->andFilterWhere(['like', 'hari', $this->hari]);

        return $dataProvider;
    }
}
