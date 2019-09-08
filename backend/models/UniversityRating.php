<?php

namespace backend\models;

use Yii;
use \backend\models\base\UniversityRating as BaseUniversityRating;

/**
 * This is the model class for table "university_rating".
 */
class UniversityRating extends BaseUniversityRating
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['university_id', 'rating'], 'required'],
            [['university_id', 'user_id', 'created_by', 'updated_by'], 'integer'],
            [['comment'], 'string'],
            [['rating'], 'number'],
            [['name', 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 4]
        ]);
    }
	
}
