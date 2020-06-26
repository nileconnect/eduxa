<?php

namespace backend\models\search;

use common\models\User;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * UserSearch represents the model behind the search form about `common\models\User`.
 */
class UserSearch extends User
{

    public $user_role;
    public $report;
    public $age;
    public $creation_from_date;
    public $creation_to_date;
    public $nationality;
    public $gender;
    public $period;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['created_at', 'updated_at', 'logged_at'], 'filter', 'filter' => 'strtotime', 'skipOnEmpty' => true],
            [['created_at', 'updated_at', 'logged_at'], 'default', 'value' => null],
            ['user_role', 'string'],
            [['user_role', 'creation_to_date', 'creation_from_date', 'age', 'username',
                'auth_key', 'password_hash', 'email', 'nationality','gender','period','report'], 'safe'],

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
     * @return ActiveDataProvider
     */
    public function search($params)
    {

        $query = User::find();

        $query->joinWith(['userProfile']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            //return $dataProvider;
        }
        $query->join('LEFT JOIN', '{{%rbac_auth_assignment}}', '{{%rbac_auth_assignment}}.user_id = {{%user}}.id');

        if ($this->user_role) {
            $query->andFilterWhere(['{{%rbac_auth_assignment}}.item_name' => $this->user_role]);
        }

        // for users report
        if($this->report){
            $query->andFilterWhere(['NOT IN', 'rbac_auth_assignment.item_name',['administrator','manager','universityManager']]);
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'user_profile.gender'=> $this->gender, 
            'user_profile.nationality'=> $this->nationality,
        ]);


        // for users report
        if(!empty($this->creation_from_date)){
            $query->andFilterWhere(['between', 'user.created_at', \strtotime($this->creation_from_date), \strtotime($this->creation_to_date)]);
        }

        

        if(!empty($this->period)){
            if($this->period == 1 ){ // month
                $query->andFilterWhere(['between', 'user.created_at', strtotime('today - 30 days'), \time()]);
            }elseif($this->period == 2){
                $query->andFilterWhere(['between', 'user.created_at', strtotime('today - 3 months'), \time()]);
            }elseif($this->period == 3){
                $query->andFilterWhere(['between', 'user.created_at', strtotime('today - 6 months'), \time()]);
            }elseif($this->period == 4){
                $query->andFilterWhere(['between', 'user.created_at', strtotime('today - 1 year'), \time()]);
            }
        }else{
            if ($this->created_at !== null) {
                $query->andFilterWhere(['between', 'user.created_at', $this->created_at, $this->created_at + 3600 * 24]);
            }

            if ($this->updated_at !== null) {
                $query->andFilterWhere(['between', 'user.updated_at', $this->updated_at, $this->updated_at + 3600 * 24]);
            }
        }


        

        if ($this->logged_at !== null) {
            $query->andFilterWhere(['between', 'user.logged_at', $this->logged_at, $this->logged_at + 3600 * 24]);
        }

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'email', $this->email]);

        if (!\Yii::$app->user->can('administrator')) {
            $query->andFilterWhere(['>', 'id', 1]); //super admin

        }

        return $dataProvider;
    }

}
