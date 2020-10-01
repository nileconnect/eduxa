<?php

namespace backend\models\search;

use backend\models\TranslationsWithText;
use backend\models\University;
use backend\models\UniversityPrograms;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * backend\models\search\UniversityProgramsSearch represents the model behind the search form about `backend\models\UniversityPrograms`.
 */
class UniversityProgramsSearch extends UniversityPrograms
{
    public $university_title;
    public $sorting;
    public $university_nextTo;
    public $university_total_rating;
    public $sortingw;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'university_id', 'major_id', 'degree_id', 'field_id', 'country_id', 'state_id', 'city_id', 'created_by', 'updated_by', 'university_nextTo'], 'integer'],
            [['title', 'study_start_date', 'study_duration', 'study_method', 'attendance_type', 'conditional_admissions', 'toefl',
                'ielts', 'bank_statment', 'high_school_transcript', 'bachelor_degree', 'certificate', 'note1', 'note2', 'created_at', 'updated_at', 'program_type'], 'safe'],
            [['annual_cost', 'total_rating', 'university_total_rating', 'sorting'], 'number'],
            [['university_title', 'university_total_rating', 'university_nextTo'], 'safe'],
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
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]],
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

    public function CustomSearch($params)
    {
        // $query = UniversityPrograms::find();
        $query = University::find();
        $query->joinWith('universityPrograms', false);

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
            'university.id' => $this->university_id,
            'university.next_to' => $this->university_nextTo,

            // 'university_programs.degree_id' => $this->degree_id,
            // 'university_programs.field_id' => $this->field_id,
            // 'university_programs.major_id' => $this->major_id,
        ]);

        if( $this->country_id > 0 ){
            $query->andFilterWhere([ 'university.country_id' => $this->country_id]);
        }

        if( $this->state_id > 0 ){
            $query->andFilterWhere([ 'university.state_id' => $this->state_id]);
        }
        if( $this->city_id > 0 ){
            $query->andFilterWhere([ 'university.city_id' => $this->city_id]);
        }


        if ($this->sorting == 0) {
            $query->andFilterWhere([
                'university.recommended' => $this->sorting,
            ]);
        } else if ($this->sorting == 1) {
            $query->andFilterWhere([
                'university.recommended' => $this->sorting,
            ]);
        }

        if ($this->major_id) {
            $query->andFilterWhere([
                'university_programs.major_id' => $this->major_id,
            ]);

        }
        if ($this->field_id) {
            $query->andFilterWhere([
                'university_programs.field_id' => $this->field_id,
            ]);

        }
        if ($this->degree_id) {
            $query->andFilterWhere([
                'university_programs.degree_id' => $this->degree_id,
            ]);
        }

        $query->andFilterWhere(['like', 'university.title', $this->university_title]);
        if ($this->university_total_rating > 0) {
            if ($this->university_total_rating == 1) {
                $query->andFilterWhere(['=', 'university.total_rating', $this->university_total_rating]);
                $query->orFilterWhere(['=', 'university.total_rating', ((int) $this->university_total_rating) + 0.5]);
                $query->orWhere('university.total_rating IS NULL');
            } else {
                $query->andFilterWhere(['=', 'university.total_rating', $this->university_total_rating]);
                $query->orFilterWhere(['=', 'university.total_rating', ((int) $this->university_total_rating) + 0.5]);
            }
        }

        if ($this->university_title) {
            $uniIdsQuery = TranslationsWithText::find()->select('model_id')
                ->where(['table_name' => 'university', 'attribute' => 'title'])->andFilterWhere(['like', 'value', $this->university_title])
                ->all();
            if (!empty($uniIdsQuery)) {
                $uniIds = array_map(function ($data) {
                    return $data['model_id'];
                }, $uniIdsQuery);
                $query->orFilterWhere(['IN', 'university.id', $uniIds]);
            }
        }

        if ($this->sorting == 2) {
            $query->orderBy('university_programs.annual_cost ASC');
        } else if ($this->sorting == 3) {
            $query->orderBy('university_programs.annual_cost DESC');
        }

        // $query->groupBy(['university.id']);
        // return var_dump($query->createCommand()->sql);
        return $dataProvider;
    }

    public function CustomSearchWithSortingByPrice($params)
    {
        $query = UniversityPrograms::find()->select(' `university_programs`.*, ( price_ratio * annual_cost ) as new_cost ');
        // $query = University::find();
        $query->joinWith('university', false);

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
            'university.id' => $this->university_id,
            'university.next_to' => $this->university_nextTo,

            // 'university_programs.degree_id' => $this->degree_id,
            // 'university_programs.field_id' => $this->field_id,
            // 'university_programs.major_id' => $this->major_id,
        ]);

        if( $this->country_id > 0 ){
            $query->andFilterWhere([ 'university.country_id' => $this->country_id]);
        }

        if( $this->state_id > 0 ){
            $query->andFilterWhere([ 'university.state_id' => $this->state_id]);
        }
        if( $this->city_id > 0 ){
            $query->andFilterWhere([ 'university.city_id' => $this->city_id]);
        }

        if ($this->sorting == 0) {
            $query->andFilterWhere([
                'university.recommended' => $this->sorting,
            ]);
        } else if ($this->sorting == 1) {
            $query->andFilterWhere([
                'university.recommended' => $this->sorting,
            ]);
        }

        if ($this->major_id) {
            $query->andFilterWhere([
                'university_programs.major_id' => $this->major_id,
            ]);

        }
        if ($this->field_id) {
            $query->andFilterWhere([
                'university_programs.field_id' => $this->field_id,
            ]);

        }
        if ($this->degree_id) {
            $query->andFilterWhere([
                'university_programs.degree_id' => $this->degree_id,
            ]);
        }

        $query->andFilterWhere(['like', 'university.title', $this->university_title]);
        if ($this->university_total_rating > 0) {
            if ($this->university_total_rating == 1) {
                $query->andFilterWhere(['=', 'university.total_rating', $this->university_total_rating]);
                $query->orFilterWhere(['=', 'university.total_rating', ((int) $this->university_total_rating) + 0.5]);
                $query->orWhere('university.total_rating IS NULL');
            } else {
                $query->andFilterWhere(['=', 'university.total_rating', $this->university_total_rating]);
                $query->orFilterWhere(['=', 'university.total_rating', ((int) $this->university_total_rating) + 0.5]);
            }
        }

        if ($this->university_title) {
            $uniIdsQuery = TranslationsWithText::find()->select('model_id')
                ->where(['table_name' => 'university', 'attribute' => 'title'])->andFilterWhere(['like', 'value', $this->university_title])
                ->all();
            if (!empty($uniIdsQuery)) {
                $uniIds = array_map(function ($data) {
                    return $data['model_id'];
                }, $uniIdsQuery);
                $query->orFilterWhere(['IN', 'university.id', $uniIds]);
            }
        }
        
        if ($this->sorting == 2) {
            $query->orderBy('new_cost ASC');
        } else if ($this->sorting == 3) {
            $query->orderBy('new_cost DESC');
        }

        // return var_dump($query->createCommand()->sql, $this->sorting);
        // $query->groupBy(['university.id']);
        return $dataProvider;
    }
}
