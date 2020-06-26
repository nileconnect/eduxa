<?php

namespace backend\models\search;

use backend\models\Requests;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * backend\models\search\RequestsSearch represents the model behind the search form about `backend\models\Requests`.
 */
class RequestsSearch extends Requests
{

    public $creation_from_date;
    public $creation_to_date;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'model_id', 'model_parent_id', 'student_id', 'requester_id', 'student_country_id', 'student_city_id', 'student_nationality_id', 'number_of_weeks'], 'integer'],
            [['model_name', 'request_by_role', 'request_notes', 'admin_notes', 'student_first_name', 'student_last_name', 'student_gender', 'student_email', 'student_mobile', 'accomodation_option', 'airport_pickup', 'airport_pickup_cost', 'course_start_date', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['accomodation_option_cost'], 'number'],
            ['created_at', 'safe'],
            [['creation_from_date', 'creation_to_date'], 'safe'],
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
        $query = Requests::find();

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
            'model_id' => $this->model_id,
            'model_parent_id' => $this->model_parent_id,
            'student_id' => $this->student_id,
            'requester_id' => $this->requester_id,
            'student_country_id' => $this->student_country_id,
            'student_city_id' => $this->student_city_id,
            'student_nationality_id' => $this->student_nationality_id,
            'accomodation_option_cost' => $this->accomodation_option_cost,
            'number_of_weeks' => $this->number_of_weeks,
        ]);

        if ($this->created_at) {

            $query->andFilterWhere(['between', 'created_at', $this->created_at . ' 00:00:00', $this->created_at . ' 23:59:59']);
        }

        if ($this->creation_from_date) {
            $query->andFilterWhere(['>= ', 'created_at', $this->creation_from_date . ' 00:00:00']);

        }

        if ($this->creation_to_date) {
            $query->andFilterWhere(['<= ', 'created_at', $this->creation_to_date . ' 23:59:59']);
        }

        $query->andFilterWhere(['like', 'model_name', $this->model_name])
            ->andFilterWhere(['like', 'request_by_role', $this->request_by_role])
            ->andFilterWhere(['like', 'request_notes', $this->request_notes])
            ->andFilterWhere(['like', 'admin_notes', $this->admin_notes])
            ->andFilterWhere(['like', 'student_first_name', $this->student_first_name])
            ->andFilterWhere(['like', 'student_last_name', $this->student_last_name])
            ->andFilterWhere(['like', 'student_gender', $this->student_gender])
            ->andFilterWhere(['like', 'student_email', $this->student_email])
            ->andFilterWhere(['like', 'student_mobile', $this->student_mobile])
            ->andFilterWhere(['like', 'accomodation_option', $this->accomodation_option])
            ->andFilterWhere(['like', 'airport_pickup', $this->airport_pickup])
            ->andFilterWhere(['like', 'airport_pickup_cost', $this->airport_pickup_cost])
            ->andFilterWhere(['like', 'course_start_date', $this->course_start_date])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);
        // echo $query->createCommand()->getRawSql();  

        return $dataProvider;
    }
}
