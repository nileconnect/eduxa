<?php

namespace backend\models;

use Yii;
use \backend\models\base\UniversityNextTo as BaseUniversityNextTo;

/**
 * This is the model class for table "university_next_to".
 */
class UniversityNextTo extends BaseUniversityNextTo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
//            [['university_id'], 'required'],
//            [['university_id'], 'integer'],
            [['title', 'created_at', 'updated_at'], 'string', 'max' => 255]
        ]);
    }
	
}
