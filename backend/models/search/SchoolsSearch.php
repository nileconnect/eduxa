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
            [['id', 'course_type', 'country_id', 'city_id', 'min_age', 'max_students_per_class', 'avg_students_per_class', 'lessons_per_week', 'created_by', 'updated_by'], 'integer'],
            [['title', 'details', 'featured', 'location', 'lat', 'lng', 'image_base_url', 'image_path', 'start_every', 'study_time', 'status', 'created_at', 'updated_at'], 'safe'],
            [['hours_per_week', 'accomodation_fees', 'registeration_fees', 'study_books_fees', 'fees_per_week', 'discount', 'total_rating'], 'number'],
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
            'course_type' => $this->course_type,
            'country_id' => $this->country_id,
            'city_id' => $this->city_id,
            'min_age' => $this->min_age,
            'max_students_per_class' => $this->max_students_per_class,
            'avg_students_per_class' => $this->avg_students_per_class,
            'lessons_per_week' => $this->lessons_per_week,
            'hours_per_week' => $this->hours_per_week,
            'accomodation_fees' => $this->accomodation_fees,
            'registeration_fees' => $this->registeration_fees,
            'study_books_fees' => $this->study_books_fees,
            'fees_per_week' => $this->fees_per_week,
            'discount' => $this->discount,
            'total_rating' => $this->total_rating,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'details', $this->details])
            ->andFilterWhere(['like', 'featured', $this->featured])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'lat', $this->lat])
            ->andFilterWhere(['like', 'lng', $this->lng])
            ->andFilterWhere(['like', 'image_base_url', $this->image_base_url])
            ->andFilterWhere(['like', 'image_path', $this->image_path])
            ->andFilterWhere(['like', 'start_every', $this->start_every])
            ->andFilterWhere(['like', 'study_time', $this->study_time])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
