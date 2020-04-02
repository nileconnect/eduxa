<?php

namespace backend\models;

use Yii;
use \backend\models\base\StudentTestResults as BaseStudentTestResults;

/**
 * This is the model class for table "student_test_results".
 */
class StudentTestResults extends BaseStudentTestResults
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['user_id', 'country_id'], 'integer'],
            [['score'], 'number'],
            [['test_name', 'test_date', 'created_at', 'updated_at'], 'string', 'max' => 255]
        ]);
    }
	
}
