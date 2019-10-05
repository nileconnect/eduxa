<?php

namespace backend\models;

use webvimark\behaviors\multilanguage\MultiLanguageTrait;
use Yii;
use \backend\models\base\UniversityProgramDegree as BaseUniversityProgramDegree;

/**
 * This is the model class for table "university_program_degree".
 */
class UniversityProgramDegree extends BaseUniversityProgramDegree
{
    use MultiLanguageTrait;

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
