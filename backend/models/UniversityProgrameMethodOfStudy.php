<?php

namespace backend\models;

use Yii;
use \backend\models\base\UniversityProgrameMethodOfStudy as BaseUniversityProgrameMethodOfStudy;

/**
 * This is the model class for table "university_programe_method_of_study".
 */
class UniversityProgrameMethodOfStudy extends BaseUniversityProgrameMethodOfStudy
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
            [[ 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 50 ,'min'=>2],

            [['status'], 'safe']
        ]);
    }
	
}
