<?php

namespace backend\models;

use Yii;
use \backend\models\base\UniversityCountries as BaseUniversityCountries;

/**
 * This is the model class for table "university_countries".
 */
class UniversityCountries extends BaseUniversityCountries
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['university_id'], 'required'],
            [['university_id', 'country_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'string', 'max' => 255]
        ]);
    }
	
}
