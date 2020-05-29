<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "school_course_week_cost".
 *
 * @property integer $id
 * @property integer $school_course_id
 * @property integer $min_no_of_weeks
 * @property integer $max_no_of_weeks
 * @property double $cost
 * @property integer $status
 *
 * @property \backend\models\SchoolCourse $schoolCourse
 */
class SchoolCourseWeekCost extends \yii\db\ActiveRecord
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
            [['school_course_id', 'min_no_of_weeks'], 'required'],
            [['school_course_id', 'min_no_of_weeks', 'max_no_of_weeks'], 'integer'],
            [['cost'], 'number'],
 [['status'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'school_course_week_cost';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'school_course_id' => Yii::t('backend', 'School Course ID'),
            'min_no_of_weeks' => Yii::t('backend', 'Min No Of Weeks'),
            'max_no_of_weeks' => Yii::t('backend', 'Max No Of Weeks'),
            'cost' => Yii::t('backend', 'Cost'),
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
     * @return \backend\models\activequery\SchoolCourseWeekCostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\activequery\SchoolCourseWeekCostQuery(get_called_class());
    }
}
