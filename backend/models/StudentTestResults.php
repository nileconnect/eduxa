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
            [['user_id', 'test_date','score','test_name'], 'required'],

            [['user_id', 'country_id'], 'integer'],
            ['test_date', 'number' , 'max'=>date('Y')],

            [['score'], 'number'],
            [['test_name',  'created_at', 'updated_at'], 'string', 'max' => 255]
        ]);
    }
	
}
