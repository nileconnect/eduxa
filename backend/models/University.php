<?php

namespace backend\models;

use trntv\filekit\behaviors\UploadBehavior;
use webvimark\behaviors\multilanguage\MultiLanguageBehavior;
use webvimark\behaviors\multilanguage\MultiLanguageTrait;
use \backend\models\base\University as BaseUniversity;

/**
 * This is the model class for table "university".
 */
class University extends BaseUniversity
{
    use MultiLanguageTrait;

    use \mootensai\relation\RelationTrait;


    /**
     * This function helps \mootensai\relation\RelationTrait runs faster
     * @return array relation names of this model
     */
    public function relationNames()
    {
        return [
            'universityCountries',
            'unversityRatings'
        ];
    }




}
