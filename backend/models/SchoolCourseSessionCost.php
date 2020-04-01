<?php

namespace backend\models;

use Yii;
use \backend\models\base\SchoolCourseSessionCost as BaseSchoolCourseSessionCost;

/**
 * This is the model class for table "school_course_session_cost".
 */
class SchoolCourseSessionCost extends BaseSchoolCourseSessionCost
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['school_course_id', 'weeks_per_session'], 'required'],
            [['school_course_id', 'weeks_per_session', 'no_of_sessions'], 'integer'],
            [['session_cost', 'week_cost'], 'number'],
            [['status'], 'string', 'max' => 4]
        ]);
    }
	
}
