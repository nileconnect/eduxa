<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "school_course".
 *
 * @property integer $id
 * @property integer $school_id
 * @property string $title
 * @property string $information
 * @property string $requirments
 * @property integer $cost_type 
 * @property integer $lessons_per_week
 * @property integer $min_no_of_students_per_class
 * @property integer $avg_no_of_students_per_class
 * @property integer $min_age
 * @property integer $required_level
 * @property integer $time_of_course
 * @property double $registeration_fees
 * @property double $discount
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property \backend\models\Schools $school
 * @property \backend\models\SchoolCourseStartDate[] $schoolCourseStartDates
 */
class SchoolCourse extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'school',
            'schoolCourseSessionCosts',
            'schoolCourseStartDates',
            'schoolCourseWeekCosts'
        ];
    }

    /**
     * @inheritdoc
     */

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'school_course';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'school_id' => Yii::t('backend', 'School ID'),
            'title' => Yii::t('backend', 'Course Name'),
            'information' => Yii::t('backend', 'Information'),
            'requirments' => Yii::t('backend', 'Requirments'),
            //'course_start_every' => Yii::t('backend', 'Course Start Every'),
            'lessons_per_week' => Yii::t('backend', 'Lessons Per Week'),
           // 'hours_per_week' => Yii::t('backend', 'Hours Per Week'),
            'min_no_of_students_per_class' => Yii::t('backend', 'Min No Of Students Per Class'),
            'avg_no_of_students_per_class' => Yii::t('backend', 'Avg No Of Students Per Class'),
            'min_age' => Yii::t('backend', 'Min Age'),
            'required_level' => Yii::t('backend', 'Required Level'),
            'time_of_course' => Yii::t('backend', 'Time Of Course'),
            'registeration_fees' => Yii::t('backend', 'Registeration Fees'),
           // 'cost_per_week' => Yii::t('backend', 'Cost Per Week'),
           // 'no_of_weeks' => Yii::t('backend', 'No Of Weeks'),
            'discount' => Yii::t('backend', 'Discount'),
            //'required_attendance_duraion' => Yii::t('backend', 'Required Attendance Duraion'),
            'school_course_type_id'=> Yii::t('backend', 'Course Type'),
            'school_course_study_language_id'=> Yii::t('backend', 'Study Language'),
            'cost_type'=> Yii::t('backend', 'Cost Type'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchool()
    {
        return $this->hasOne(\backend\models\Schools::className(), ['id' => 'school_id']);
    }

    public function getSchoolCourseType()
    {
        return $this->hasOne(\backend\models\SchoolCourseType::className(), ['id' => 'school_course_type_id']);
    }

    public function getSchoolCourseStudyLanguage()
    {
        return $this->hasOne(\backend\models\SchoolCourseStudyLanguage::className(), ['id' =>
        'school_course_study_language_id']);
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */

    public function getSchoolCourseSessionCosts()
    {
        return $this->hasMany(\backend\models\SchoolCourseSessionCost::className(), ['school_course_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchoolCourseStartDates()
    {
        return $this->hasMany(\backend\models\SchoolCourseStartDate::className(), ['school_course_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchoolCourseWeekCosts()
    {
        return $this->hasMany(\backend\models\SchoolCourseWeekCost::className(), ['school_course_id' => 'id']);
    }


    /**
     * @inheritdoc
     * @return \backend\models\activequery\SchoolCourseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\activequery\SchoolCourseQuery(get_called_class());
    }
}
