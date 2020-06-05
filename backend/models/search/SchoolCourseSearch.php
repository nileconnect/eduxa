<?php

namespace backend\models\search;

use backend\models\Schools;
use backend\models\University;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SchoolCourse;

/**
 * backend\models\search\SchoolCourseSearch represents the model behind the search form about `backend\models\SchoolCourse`.
 */
 class SchoolCourseSearch extends SchoolCourse
{
    public  $country_id ;
    public  $state_id ;
    public  $city_id ;
    public $school_total_rating;
    public $school_nextTo;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'school_id', 'lessons_per_week', 'min_no_of_students_per_class', 'avg_no_of_students_per_class', 'min_age', 'created_by', 'updated_by',
                'country_id','state_id', 'city_id','school_total_rating','school_nextTo'], 'integer'],
            [['title', 'information', 'requirments',  'required_level', 'time_of_course', 'created_at', 'updated_at','status'], 'safe'],
            [[ 'registeration_fees', 'discount'], 'number'],
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
            'min_no_of_students_per_class' => $this->min_no_of_students_per_class,
            'avg_no_of_students_per_class' => $this->avg_no_of_students_per_class,
            'min_age' => $this->min_age,
            'registeration_fees' => $this->registeration_fees,
            'discount' => $this->discount,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'information', $this->information])
            ->andFilterWhere(['like', 'requirments', $this->requirments])
            ->andFilterWhere(['like', 'required_level', $this->required_level])
            ->andFilterWhere(['like', 'time_of_course', $this->time_of_course])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }


     public function CustomSearch($params)
     {

         $query = Schools::find();
         $query->innerJoinWith('schoolCourses', false);
         $dataProvider = new ActiveDataProvider([
             'query' => $query,
         ]);

         $this->load($params);

         if (!$this->validate()) {
             // uncomment the following line if you do not want to return any records when validation fails
             // $query->where('0=1');
             //  return $dataProvider;
         }
         $query->andFilterWhere([
             'schools.id' => $this->school_id,
             'schools.country_id' => $this->country_id,
             'schools.state_id' => $this->state_id,
             'schools.city_id' => $this->city_id,
             'schools.next_to' => $this->school_nextTo,

             'school_course.required_level' => $this->required_level,
             'school_course.time_of_course' => $this->time_of_course,
         ]);


         if($this->title){
             $query->andFilterWhere(['or',
                 ['like','school_course.title',$this->title],
                 ['like','schools.title',$this->title]]);
         }


         $query ->andFilterWhere(['>=', 'schools.total_rating', $this->school_total_rating]);

         $query->groupBy(['schools.id']);

         return $dataProvider;

     }
}
