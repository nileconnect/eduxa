<?php

namespace backend\models\search;

use backend\models\Schools;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\Query;

/**
 * backend\models\search\SchoolsSearch represents the model behind the search form about `backend\models\Schools`.
 */
class SchoolsSearch extends Schools
{

    public $school_logo;
    public $imagesCount;
    public $videosCount;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'country_id', 'city_id', 'min_age', 'max_students_per_class', 'avg_students_per_class', 'no_of_ratings', 'created_by', 'updated_by'], 'integer'],
            [['title', 'details', 'featured', 'location', 'lat', 'lng', 'image_base_url', 'image_path', 'has_health_insurance', 'status', 'created_at', 'updated_at'], 'safe'],
            [['accomodation_fees', 'registeration_fees', 'study_books_fees', 'discount', 'total_rating', 'accomodation_reservation_fees', 'health_insurance_cost'], 'number'],
            [['school_logo', 'imagesCount', 'videosCount'], 'safe'],
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
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'country_id' => $this->country_id,
            'city_id' => $this->city_id,
            'min_age' => $this->min_age,
            'max_students_per_class' => $this->max_students_per_class,
            'avg_students_per_class' => $this->avg_students_per_class,
            'accomodation_fees' => $this->accomodation_fees,
            'registeration_fees' => $this->registeration_fees,
            'study_books_fees' => $this->study_books_fees,
            'discount' => $this->discount,
            'no_of_ratings' => $this->no_of_ratings,
            'total_rating' => $this->total_rating,
            'accomodation_reservation_fees' => $this->accomodation_reservation_fees,
            'health_insurance_cost' => $this->health_insurance_cost,
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
            ->andFilterWhere(['like', 'has_health_insurance', $this->has_health_insurance])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }

    public function mediaSearch($params)
    {

        $query = Schools::find()->select(['schools.*','imagesCount','videosCount'])->from('schools');

        $subPhotoQuery = (new Query())->select('school_id, COUNT(*) AS imagesCount ')->from('school_photos');
        $subPhotoQuery->groupBy('school_id');

        $subVedioQuery = (new Query())->select('school_id, COUNT(*) AS videosCount ')->from('school_videos');
        $subVedioQuery->groupBy('school_id');

        $query->leftJoin(['photos' => $subPhotoQuery], 'schools.id = photos.school_id');
        $query->leftJoin(['videos' => $subVedioQuery], 'schools.id = videos.school_id');

        // return var_dump($subPhotoQuery->createCommand()->sql,
        //     $subVedioQuery->createCommand()->sql,
        //     $query->createCommand()->sql
        // );

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if ($this->school_logo == 1) {
            $query->andWhere(['not', ['image_path' => null]]);

        } else if ($this->school_logo == 2) {
            $query->andWhere(['is', 'image_path', null]);

        }

        if (!empty($this->imagesCount)) {
            $query->andFilterHaving([
                'imagesCount' => $this->imagesCount,
            ]);
        }

        if (!empty($this->videosCount)) {
            $query->andFilterHaving([
                'videosCount' => $this->videosCount,
            ]);
        }

        $query->andFilterWhere(['like', 'schools.title', trim($this->title)]);

        // echo $query->createCommand()->getRawSql();die;
        return $dataProvider;
    }
}
