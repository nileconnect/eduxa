<?php

namespace backend\models;

use trntv\filekit\behaviors\UploadBehavior;
use webvimark\behaviors\multilanguage\MultiLanguageBehavior;
use webvimark\behaviors\multilanguage\MultiLanguageTrait;
use Yii;
use \backend\models\base\University as BaseUniversity;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "university".
 */
class University extends BaseUniversity
{
    use MultiLanguageTrait;

    public $logo;
    public $photos;

    const STATUS_OFF = 0;
    const STATUS_ON = 1;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['total_rating'], 'number'],
            [['no_of_ratings', 'created_by', 'updated_by','status','responsible_id'], 'integer'],
            [['title', 'image_base_url', 'image_path', 'detailed_address', 'location', 'lat', 'lng', 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['recommended'], 'string', 'max' => 1],
            [['logo','photos'],'safe']
        ];
    }

    public static function LisStatusList(){
        return [
            self::STATUS_ON =>'Active',
            self::STATUS_OFF =>'Not Active' ,
        ];
    }

    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            [
                'class' => UploadBehavior::class,
                'attribute' => 'logo',
                'pathAttribute' => 'image_path',
                'baseUrlAttribute' => 'image_base_url',
            ],
            [
                'class' => UploadBehavior::class,
                'attribute' => 'photos',
                'multiple' => true,
                'uploadRelation' => 'universityPhotos',
                'pathAttribute' => 'path',
                'baseUrlAttribute' => 'base_url',
                'orderAttribute' => 'order',
                'typeAttribute' => 'type',
                'sizeAttribute' => 'size',
                'nameAttribute' => 'name',
            ],

            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],

            'mlBehavior'=>[
                'class'    => MultiLanguageBehavior::className(),
                'mlConfig' => [
                    'db_table'         => 'translations_with_text',
                    'attributes'       => ['title','description'],
                    'admin_routes'     => [
                        'university/update',
                        'university/index',
                    ],
                ],
            ],

        ];
    }


}
