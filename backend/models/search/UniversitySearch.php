<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\University;

/**
 * backend\models\search\UniversitySearch represents the model behind the search form about `backend\models\University`.
 */
 class UniversitySearch extends University
{
    public $unversity_logo;
    public $imagesCount;
    public $videosCount;

     /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'no_of_ratings', 'created_by', 'updated_by'], 'integer'],
            [['title', 'image_base_url', 'image_path', 'description', 'detailed_address', 'location', 'lat', 'lng',
                'recommended', 'created_at', 'updated_at','responsible_id','unversity_logo','imagesCount','videosCount'], 'safe'],
            [['total_rating'], 'number'],
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
        $query = University::find();

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
            'total_rating' => $this->total_rating,
            'responsible_id' => $this->responsible_id,
            'no_of_ratings' => $this->no_of_ratings,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        if($this->unversity_logo == 1){
            $query->andWhere(['not', ['image_path' => null]]);

        }else if($this->unversity_logo == 2 ){
            $query->andWhere(['is', 'image_path', null]);

        }else{}

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'detailed_address', $this->detailed_address])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'lat', $this->lat])
            ->andFilterWhere(['like', 'lng', $this->lng])
            ->andFilterWhere(['like', 'recommended', $this->recommended])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);
       //  echo $this->unversity_logo;
        //echo $query->createCommand()->getRawSql();  die;
        return $dataProvider;
    }

     public function mediaSearch($params)
     {
         $query = University::find();
         $query ->select([
             '{{university}}.*', // select all customer fields
             'COUNT({{university_photos}}.id)  AS imagesCount', // calculate orders count
             'COUNT({{university_videos}}.id) AS videosCount', // calculate orders count
         ]);

         $query->joinWith('universityPhotos');
         $query->joinWith('universityVideos');
         $query->groupBy('{{university}}.id');


         $dataProvider = new ActiveDataProvider([
             'query' => $query,
         ]);

         $this->load($params);

         if (!$this->validate()) {
             // uncomment the following line if you do not want to return any records when validation fails
             // $query->where('0=1');
            // return $dataProvider;
         }


         $query->andFilterWhere([
             'id' => $this->id,
             'total_rating' => $this->total_rating,
             'responsible_id' => $this->responsible_id,
             'no_of_ratings' => $this->no_of_ratings,
             'created_by' => $this->created_by,
             'updated_by' => $this->updated_by,
         ]);

         if($this->unversity_logo == 1){
             $query->andWhere(['not', ['image_path' => null]]);

         }else if($this->unversity_logo == 2 ){
             $query->andWhere(['is', 'image_path', null]);

         }else{}

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


         $query->andFilterWhere(['like', 'title', $this->title])
             ->andFilterWhere(['like', 'description', $this->description])
             ->andFilterWhere(['like', 'detailed_address', $this->detailed_address])
             ->andFilterWhere(['like', 'location', $this->location])
             ->andFilterWhere(['like', 'lat', $this->lat])
             ->andFilterWhere(['like', 'lng', $this->lng])
             ->andFilterWhere(['like', 'recommended', $this->recommended])
             ->andFilterWhere(['like', 'created_at', $this->created_at])
             ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

         //  echo $this->unversity_logo;
        // echo $query->createCommand()->getRawSql();  die;
         return $dataProvider;
     }
}
