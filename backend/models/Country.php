<?php

namespace backend\models;

use trntv\filekit\behaviors\UploadBehavior;
use webvimark\behaviors\multilanguage\MultiLanguageBehavior;
use webvimark\behaviors\multilanguage\MultiLanguageTrait;
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

    use MultiLanguageTrait;

    public $image;
    public $attachments;

    public $title_ar;
    public $intro_ar;
    public $details_ar;

    const SCENARIO_IMPORT= 'import';


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

            'mlBehavior'=>[
                'class'    => MultiLanguageBehavior::className(),
                'mlConfig' => [
                    'db_table'         => 'translations_with_text',
                    'attributes'       => ['title','intro','details'],
                    'admin_routes'     => [
                        'country/update',
                        'country/index',
                    ],
                ],
            ],
        ];
    }

    public function rules()
    {
        return [
            [['title'], 'unique'],
            [['title', 'code','intro','details'], 'required', 'on' => self::SCENARIO_IMPORT],
            [['title', 'code','image','attachments','intro','details'], 'required','on'=>'normal'],
            [['title', 'code'], 'string', 'max' => 50,'min'=>2],
            [['intro'], 'string', 'max' => 5000,'min'=>2],
            [['details'], 'string', 'max' => 2000,'min'=>2],
            [['title', 'code'], 'unique'],
            [['title', 'code'], 'unique','on'=>'import'],
            [['image_base_url', 'image_path'], 'string', 'max' => 255],
            [['image','attachments','status','top_destination','title_ar','intro_ar','details_ar'],'safe']
        ];
    }


    public function getFlag($default = '/img/destinations/england.jpg')
    {
        return $this->image_path
            ? Yii::getAlias($this->image_base_url . '/' . $this->image_path)
            : $default;
    }
}
