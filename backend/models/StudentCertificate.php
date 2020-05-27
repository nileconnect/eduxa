<?php

namespace backend\models;

use Yii;
use \backend\models\base\StudentCertificate as BaseStudentCertificate;

/**
 * This is the model class for table "student_certificate".
 */
class StudentCertificate extends BaseStudentCertificate
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['user_id', 'year','grade','university_or_school', 'country_id'], 'required'],
            ['year', 'number' , 'max'=>date('Y')],
            [['user_id',  'country_id'], 'integer'],
            [['certificate_name', 'grade', 'university_or_school', 'created_at', 'updated_at'], 'string', 'max' => 255],


        ]);
    }
	
}
