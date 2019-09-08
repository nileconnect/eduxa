<?php

namespace backend\models;

use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use \backend\models\base\Country as BaseCountry;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "country".
 */
class Country extends BaseCountry
{
    public  $image;
    public $attachments;

    /**
     * @inheritdoc
     */


    public function behaviors()
    {
        return [

            [
                'class' => UploadBehavior::class,
                'attribute' => 'attachments',
                'multiple' => true,
                'uploadRelation' => 'countryAttachments',
                'pathAttribute' => 'path',
                'baseUrlAttribute' => 'base_url',
                'orderAttribute' => 'order',
                'typeAttribute' => 'type',
                'sizeAttribute' => 'size',
                'nameAttribute' => 'name',
            ],
            [
                'class' => UploadBehavior::class,
                'attribute' => 'image',
                'pathAttribute' => 'image_path',
                'baseUrlAttribute' => 'image_base_url',
            ],
        ];
    }

    public function rules()
    {
        return [
            [['intro', 'details'], 'string'],
            [['title', 'code', 'image_base_url', 'image_path'], 'string', 'max' => 255],
            [['image','attachments'],'safe']
        ];
    }
	
}
