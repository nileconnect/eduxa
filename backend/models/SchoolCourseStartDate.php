<?php

namespace backend\models;

use Yii;
use \backend\models\base\SchoolCourseStartDate as BaseSchoolCourseStartDate;

/**
 * This is the model class for table "school_course_start_date".
 */
class SchoolCourseStartDate extends BaseSchoolCourseStartDate
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return 
	    [
            [['school_course_id', 'course_date'], 'required'],
            [['school_course_id'], 'integer'],
            ['course_date','compareDates','on'=>'create'],
        ];
    }

    public function compareDates()
    {
        $date = strtotime($this->course_date);
        $now_date = time();
        if (!$this->hasErrors() && $now_date > $date) {
            $this->addError('course_date', 'Course start date is not valid.');
        }
    }
	
}
