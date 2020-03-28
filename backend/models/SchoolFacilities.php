<?php

namespace backend\models;

use Yii;
use \backend\models\base\SchoolFacilities as BaseSchoolFacilities;

/**
 * This is the model class for table "school_facilities".
 */
class SchoolFacilities extends BaseSchoolFacilities
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['school_id'], 'integer'],
            [['title', 'created_at', 'updated_at'], 'string', 'max' => 255]
        ]);
    }
	
}
