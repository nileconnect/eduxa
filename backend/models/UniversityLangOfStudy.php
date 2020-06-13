<?php

namespace backend\models;

use Yii;
use \backend\models\base\UniversityLangOfStudy as BaseUniversityLangOfStudy;

/**
 * This is the model class for table "university_lang_of_study".
 */
class UniversityLangOfStudy extends BaseUniversityLangOfStudy
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 50 ,'min'=>2],

            [['status'], 'safe']
        ];
    }
	
}
