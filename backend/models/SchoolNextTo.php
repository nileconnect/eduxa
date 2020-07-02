<?php

namespace backend\models;

use Yii;
use \backend\models\base\SchoolNextTo as BaseSchoolNextTo;

/**
 * This is the model class for table "school_next_to".
 */
class SchoolNextTo extends BaseSchoolNextTo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return 
	    [
            [['school_id'], 'integer'],
            [['title'], 'unique'],
            [[ 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 30 ,'min'=>2],

        ];
    }
	
}
