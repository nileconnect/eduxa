<?php

namespace backend\models;

use Yii;
use \backend\models\base\UniversityProgrameConditionalAdmission as BaseUniversityProgrameConditionalAdmission;

/**
 * This is the model class for table "university_programe_conditional_admission".
 */
class UniversityProgrameConditionalAdmission extends BaseUniversityProgrameConditionalAdmission
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return 
	    [
            [['title'], 'required'],
            [['title'], 'unique'],
            [['created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 30 ,'min'=>2],
            [['status'], 'integer']
        ];
    }
	
}
