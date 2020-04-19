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
        return array_replace_recursive(parent::rules(),
	    [
            [['school_course_id', 'course_date'], 'required'],
            [['school_course_id'], 'integer'],
            [['course_date'], 'string', 'max' => 255]
        ]);
    }
	
}