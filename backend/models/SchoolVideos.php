<?php

namespace backend\models;

use Yii;
use \backend\models\base\SchoolVideos as BaseSchoolVideos;

/**
 * This is the model class for table "school_videos".
 */
class SchoolVideos extends BaseSchoolVideos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['school_id', 'path'], 'safe'],
            [['school_id', 'size', 'created_at', 'order'], 'integer'],
            [['path', 'base_url', 'type', 'name'], 'string', 'max' => 255],
            ['base_url', 'match', 'pattern' => '/^(https?\:\/\/)?(www\.youtube\.com|youtu\.?be)\/.+$/' ,'message'=>Yii::t('common','Enter valid youtube link')],

        ]);
    }

}
