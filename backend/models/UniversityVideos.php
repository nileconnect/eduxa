<?php

namespace backend\models;

use Yii;
use \backend\models\base\UniversityVideos as BaseUniversityVideos;

/**
 * This is the model class for table "university_videos".
 */
class UniversityVideos extends BaseUniversityVideos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['university_id', 'path'], 'required'],
            [['university_id', 'size', 'created_at', 'order'], 'integer'],
            [['path', 'base_url', 'type', 'name'], 'string', 'max' => 255]
        ]);
    }
	
}
