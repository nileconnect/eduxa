<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "school_course_session_cost".
 *
 * @property integer $id
 * @property integer $school_course_id
 * @property integer $weeks_per_session
 * @property integer $no_of_sessions
 * @property double $session_cost
 * @property double $week_cost
 * @property integer $status
 *
 * @property \backend\models\SchoolCourse $schoolCourse
 */
class SchoolCourseSessionCost extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'schoolCourse'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_course_id', 'weeks_per_session'], 'required'],
            [['school_course_id', 'weeks_per_session', 'no_of_sessions'], 'integer'],
            [['session_cost', 'week_cost'], 'number'],
 [['status'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'school_course_session_cost';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'school_course_id' => Yii::t('backend', 'School Course ID'),
            'weeks_per_session' => Yii::t('backend', 'Weeks Per Session'),
            'no_of_sessions' => Yii::t('backend', 'No Of Sessions'),
            'session_cost' => Yii::t('backend', 'Session Cost'),
            'week_cost' => Yii::t('backend', 'Week Cost'),
            'status' => Yii::t('backend', 'Status'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchoolCourse()
    {
        return $this->hasOne(\backend\models\SchoolCourse::className(), ['id' => 'school_course_id']);
    }
    

    /**
     * @inheritdoc
     * @return \backend\models\activequery\SchoolCourseSessionCostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\activequery\SchoolCourseSessionCostQuery(get_called_class());
    }
}
