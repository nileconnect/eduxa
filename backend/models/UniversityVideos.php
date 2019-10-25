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
        return [
            [['university_id', 'base_url'], 'safe'],
            [['university_id', 'size', 'created_at', 'order','path', 'base_url', 'type', 'name'], 'safe'],
            // [['path', 'base_url', 'type', 'name'], 'string', 'max' => 255]
        ];
    }
}
