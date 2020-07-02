<?php

namespace backend\models;

use Yii;
use \backend\models\base\UniversityProgramMediumOfStudy as BaseUniversityProgramMediumOfStudy;

/**
 * This is the model class for table "university_program_medium_of_study".
 */
class UniversityProgramMediumOfStudy extends BaseUniversityProgramMediumOfStudy
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
            [['title'], 'string', 'max' => 30,'min'=>2],
            [['status'], 'integer']
        ];
    }
	
}
