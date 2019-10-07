<?php

namespace backend\models;

use Yii;
use \backend\models\base\SchoolPhotos as BaseSchoolPhotos;

/**
 * This is the model class for table "school_photos".
 */
class SchoolPhotos extends BaseSchoolPhotos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['school_id', 'path'], 'required'],
            [['school_id', 'size', 'created_at', 'order'], 'integer'],
            [['path', 'base_url', 'type', 'name'], 'string', 'max' => 255]
        ]);
    }
	
}
