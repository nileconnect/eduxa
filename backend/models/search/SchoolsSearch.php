<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Schools;

/**
 * backend\models\search\SchoolsSearch represents the model behind the search form about `backend\models\Schools`.
 */
 class SchoolsSearch extends Schools
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'school_identity_number', 'city_id', 'district_id', 'stage', 'owner_id', 'created_by', 'updated_by'], 'integer'],
            [['title', 'slug', 'gender', 'category', 'email', 'admin_name', 'admin_phone', 'admin_email', 'supervisor_phone', 'owner_name', 'owner_phone', 'owner_identity', 'owner_gender', 'owner_email', 'nour_rep_phone', 'created_at', 'updated_at', 'lock', 'deleted_by'], 'safe'],
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
        $query = Schools::find();

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
            'school_identity_number' => $this->school_identity_number,
            'city_id' => $this->city_id,
            'district_id' => $this->district_id,
            'stage' => $this->stage,
            'owner_id' => $this->owner_id,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'admin_name', $this->admin_name])
            ->andFilterWhere(['like', 'admin_phone', $this->admin_phone])
            ->andFilterWhere(['like', 'admin_email', $this->admin_email])
            ->andFilterWhere(['like', 'supervisor_phone', $this->supervisor_phone])
            ->andFilterWhere(['like', 'owner_name', $this->owner_name])
            ->andFilterWhere(['like', 'owner_phone', $this->owner_phone])
            ->andFilterWhere(['like', 'owner_identity', $this->owner_identity])
            ->andFilterWhere(['like', 'owner_gender', $this->owner_gender])
            ->andFilterWhere(['like', 'owner_email', $this->owner_email])
            ->andFilterWhere(['like', 'nour_rep_phone', $this->nour_rep_phone])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at])
            ->andFilterWhere(['like', 'lock', $this->lock])
            ->andFilterWhere(['like', 'deleted_by', $this->deleted_by]);

        return $dataProvider;
    }
}
