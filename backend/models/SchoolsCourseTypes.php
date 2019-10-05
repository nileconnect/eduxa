<?php

namespace backend\models;

use Yii;
use \backend\models\base\SchoolsCourseTypes as BaseSchoolsCourseTypes;

/**
 * This is the model class for table "schools_course_types".
 */
class SchoolsCourseTypes extends BaseSchoolsCourseTypes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['title'], 'required'],
            [['created_by', 'updated_by'], 'integer'],
            [['title', 'created_at', 'updated_at'], 'string', 'max' => 255]
        ]);
    }
	
}
