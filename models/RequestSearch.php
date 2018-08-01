<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Request;

/**
 * RequestSearch represents the model behind the search form about `app\models\Request`.
 */
class RequestSearch extends Request
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_request', 'id_user', 'id_mk', 'id_kelas', 'id_ruangan'], 'integer'],
            [['tanggal_req', 'hari', 'tanggal', 'alasan', 'status'], 'safe'],
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
        $query = Request::find();

        // add conditions that should always apply here

        if(Yii::$app->user->identity->id_role === 1){
           $query = Request::find();
         }
       else {
           $query = Request::find()->where(['id_user' => Yii::$app->user->id]);
         }

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
            'id_request' => $this->id_request,
            'tanggal_req' => $this->tanggal_req,
            'id_user' => $this->id_user,
            'id_mk' => $this->id_mk,
            'id_kelas' => $this->id_kelas,
            'id_ruangan' => $this->id_ruangan,
            'tanggal' => $this->tanggal,
        ]);

        $query->andFilterWhere(['like', 'hari', $this->hari])
            ->andFilterWhere(['like', 'alasan', $this->alasan])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
