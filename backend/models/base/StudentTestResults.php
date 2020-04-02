<?php

namespace backend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "student_test_results".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $test_name
 * @property double $score
 * @property string $test_date
 * @property integer $country_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \backend\models\User $user
 */
class StudentTestResults extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'user'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'country_id'], 'integer'],
            [['score'], 'number'],
            [['test_name', 'test_date', 'created_at', 'updated_at'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student_test_results';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'user_id' => Yii::t('backend', 'User ID'),
            'test_name' => Yii::t('backend', 'Test Name'),
            'score' => Yii::t('backend', 'Score'),
            'test_date' => Yii::t('backend', 'Test Date'),
            'country_id' => Yii::t('backend', 'Country ID'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\backend\models\User::className(), ['id' => 'user_id']);
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }


    /**
     * @inheritdoc
     * @return \backend\models\activequery\StudentTestResultsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\activequery\StudentTestResultsQuery(get_called_class());
    }
}
