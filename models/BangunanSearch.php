<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bangunan;

/**
 * BangunanSearch represents the model behind the search form about `app\models\Bangunan`.
 */
class BangunanSearch extends Bangunan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_bangunan'], 'integer'],
            [['nama_bangunan'], 'safe'],
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
        $query = Bangunan::find();

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
            'id_bangunan' => $this->id_bangunan,
        ]);

        $query->andFilterWhere(['like', 'nama_bangunan', $this->nama_bangunan]);

        return $dataProvider;
    }
}
