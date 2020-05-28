<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\UniversityPrograms;

/**
 * backend\models\search\UniversityProgramsSearch represents the model behind the search form about `backend\models\UniversityPrograms`.
 */
 class UniversityProgramsSearch extends UniversityPrograms
{
    public $university_title ;
    public $university_country ;
    public $university_nextTo ;
    public $university_total_rating ;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'university_id', 'major_id', 'degree_id', 'field_id', 'country_id','state_id', 'city_id', 'created_by', 'updated_by','university_country','university_nextTo'], 'integer'],
            [['title', 'study_start_date', 'study_duration', 'study_method', 'attendance_type', 'conditional_admissions', 'toefl',
                'ielts', 'bank_statment', 'high_school_transcript', 'bachelor_degree', 'certificate', 'note1', 'note2', 'created_at', 'updated_at', 'program_type'], 'safe'],
            [['annual_cost', 'total_rating','university_total_rating'], 'number'],
            [['university_country','university_title','university_total_rating','university_nextTo'],'safe']
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
        $query = UniversityPrograms::find();

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
            'id' => $this->id,
            'university_id' => $this->university_id,
            'major_id' => $this->major_id,
            'degree_id' => $this->degree_id,
            'field_id' => $this->field_id,
            'country_id' => $this->country_id,
            'city_id' => $this->city_id,
            'annual_cost' => $this->annual_cost,
            'total_rating' => $this->total_rating,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'study_start_date', $this->study_start_date])
            ->andFilterWhere(['like', 'study_duration', $this->study_duration])
            ->andFilterWhere(['like', 'study_method', $this->study_method])
            ->andFilterWhere(['like', 'attendance_type', $this->attendance_type])
            ->andFilterWhere(['like', 'conditional_admissions', $this->conditional_admissions])
            ->andFilterWhere(['like', 'toefl', $this->toefl])
            ->andFilterWhere(['like', 'ielts', $this->ielts])
            ->andFilterWhere(['like', 'bank_statment', $this->bank_statment])
            ->andFilterWhere(['like', 'high_school_transcript', $this->high_school_transcript])
            ->andFilterWhere(['like', 'bachelor_degree', $this->bachelor_degree])
            ->andFilterWhere(['like', 'certificate', $this->certificate])
            ->andFilterWhere(['like', 'note1', $this->note1])
            ->andFilterWhere(['like', 'note2', $this->note2])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at])
            ->andFilterWhere(['like', 'program_type', $this->program_type]);

        return $dataProvider;
    }
}
