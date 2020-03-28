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
        return array_replace_recursive(parent::rules(),
	    [
            [['title'], 'required'],
            [['created_by', 'updated_by'], 'integer'],
            [['title', 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 4]
        ]);
    }
	
}