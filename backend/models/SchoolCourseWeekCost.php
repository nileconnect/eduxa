<?php

namespace backend\models;

use Yii;
use \backend\models\base\SchoolCourseWeekCost as BaseSchoolCourseWeekCost;

/**
 * This is the model class for table "school_course_week_cost".
 */
class SchoolCourseWeekCost extends BaseSchoolCourseWeekCost
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['school_course_id', 'min_no_of_weeks'], 'required'],
            [['school_course_id', 'min_no_of_weeks', 'max_no_of_weeks'], 'integer'],
            [['cost'], 'number'],
 [['status'], 'integer']
        ]);
    }
	
}
