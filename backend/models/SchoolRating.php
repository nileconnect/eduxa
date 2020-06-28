<?php

namespace backend\models;

use Yii;
use \backend\models\base\SchoolRating as BaseSchoolRating;

/**
 * This is the model class for table "school_rating".
 */
class SchoolRating extends BaseSchoolRating
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['school_id','comment', 'rating'], 'required'],
            [['school_id', 'user_id', 'created_by', 'updated_by'], 'integer'],
            [['comment'], 'string'],
            [['rating'], 'number'],
            [['name'], 'string', 'max' => 30 ,'min'=>2],
            [['comment'], 'string', 'max' => 500 ,'min'=>2],
            [['created_at', 'updated_at'], 'string', 'max' => 255],
            [['status'], 'integer']
        ]);
    }
	
}
