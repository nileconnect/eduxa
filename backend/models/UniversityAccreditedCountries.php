<?php

namespace backend\models;

use Yii;
use \backend\models\base\UniversityAccreditedCountries as BaseUniversityAccreditedCountries;

/**
 * This is the model class for table "university_accredited_countries".
 */
class UniversityAccreditedCountries extends BaseUniversityAccreditedCountries
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['university_id', 'country_id'], 'integer']
        ]);
    }
	
}
