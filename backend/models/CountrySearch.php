<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Country;

/**
 * backend\models\CountrySearch represents the model behind the search form about `backend\models\Country`.
 */
 class CountrySearch extends Country
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'code', 'image_base_url', 'image_path', 'intro', 'details','status','top_destination'], 'safe'],
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
        $query = Country::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'top_destination' => $this->top_destination,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'image_base_url', $this->image_base_url])
            ->andFilterWhere(['like', 'image_path', $this->image_path])
            ->andFilterWhere(['like', 'intro', $this->intro])
            ->andFilterWhere(['like', 'details', $this->details]);

        return $dataProvider;
    }
}
