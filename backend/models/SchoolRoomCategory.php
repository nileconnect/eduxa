<?php

namespace backend\models;

use Yii;
use \backend\models\base\SchoolRoomCategory as BaseSchoolRoomCategory;

/**
 * This is the model class for table "school_room_category".
 */
class SchoolRoomCategory extends BaseSchoolRoomCategory
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
