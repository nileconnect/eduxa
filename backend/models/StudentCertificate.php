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
            [['user_id', 'year','grade','university_or_school', 'country_id','certificate_name'], 'required'],
            ['year', 'date','format' => 'php:Y' ,'min'=>1950, 'max'=>date('Y')],
            [['user_id',  'country_id'], 'integer'],
            [[  'created_at', 'updated_at'], 'string', 'max' => 255],
            [['certificate_name','university_or_school'], 'string','min'=>2, 'max' => 30],
            [['grade'], 'string','min'=>1, 'max' => 3],
        ]);
    }
}
