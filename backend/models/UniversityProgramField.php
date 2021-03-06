<?php

namespace backend\models;

use webvimark\behaviors\multilanguage\MultiLanguageTrait;
use Yii;
use \backend\models\base\UniversityProgramField as BaseUniversityProgramField;

/**
 * This is the model class for table "university_program_field".
 */
class UniversityProgramField extends BaseUniversityProgramField
{
    use MultiLanguageTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return 
	    [
            [['title'], 'unique'],
            [['title'], 'required'],
            [['created_by', 'updated_by'], 'integer'],
            [[ 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 30,'min'=>2],

        ];
    }
	
}
