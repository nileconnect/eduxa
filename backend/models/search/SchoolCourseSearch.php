<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SchoolCourse;

/**
 * backend\models\search\SchoolCourseSearch represents the model behind the search form about `backend\models\SchoolCourse`.
 */
 class SchoolCourseSearch extends SchoolCourse
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'school_id', 'lessons_per_week', 'min_no_of_students_per_class', 'avg_no_of_students_per_class', 'min_age', 'no_of_weeks', 'created_by', 'updated_by'], 'integer'],
            [['title', 'information', 'requirments', 'course_start_every', 'required_level', 'time_of_course', 'required_attendance_duraion', 'created_at', 'updated_at','status'], 'safe'],
            [['hours_per_week', 'registeration_fees', 'cost_per_week', 'discount'], 'number'],
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
        $query = SchoolCourse::find();

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
            'school_id' => $this->school_id,
            'lessons_per_week' => $this->lessons_per_week,
            'hours_per_week' => $this->hours_per_week,
            'min_no_of_students_per_class' => $this->min_no_of_students_per_class,
            'avg_no_of_students_per_class' => $this->avg_no_of_students_per_class,
            'min_age' => $this->min_age,
            'registeration_fees' => $this->registeration_fees,
            'cost_per_week' => $this->cost_per_week,
            'no_of_weeks' => $this->no_of_weeks,
            'discount' => $this->discount,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'information', $this->information])
            ->andFilterWhere(['like', 'requirments', $this->requirments])
            ->andFilterWhere(['like', 'course_start_every', $this->course_start_every])
            ->andFilterWhere(['like', 'required_level', $this->required_level])
            ->andFilterWhere(['like', 'time_of_course', $this->time_of_course])
            ->andFilterWhere(['like', 'required_attendance_duraion', $this->required_attendance_duraion])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
