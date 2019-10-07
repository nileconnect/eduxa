<?php

namespace backend\models;

use trntv\filekit\behaviors\UploadBehavior;
use webvimark\behaviors\multilanguage\MultiLanguageBehavior;
use webvimark\behaviors\multilanguage\MultiLanguageTrait;
use Yii;
use \backend\models\base\Schools as BaseSchools;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "schools".
 */
class Schools extends BaseSchools
{
    use MultiLanguageTrait;

    public $logo;
    public $videos;
    public $photos;

    const STATUS_OFF = 0;
    const STATUS_ON = 1;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['title', 'required'],
            [['course_type', 'country_id', 'city_id', 'min_age', 'max_students_per_class', 'avg_students_per_class', 'lessons_per_week', 'created_by', 'updated_by'], 'integer'],
            [['details'], 'string'],
            [['hours_per_week', 'accomodation_fees', 'registeration_fees', 'study_books_fees', 'fees_per_week', 'discount', 'total_rating'], 'number'],
            [['title', 'location', 'lat', 'lng', 'image_base_url', 'image_path', 'start_every', 'study_time', 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['featured', 'status'], 'string', 'max' => 4],
            [['logo','videos','photos'],'safe']
        ] ;
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
                'uploadRelation' => 'schoolPhotos',
                'pathAttribute' => 'path',
                'baseUrlAttribute' => 'base_url',
                'orderAttribute' => 'order',
                'typeAttribute' => 'type',
                'sizeAttribute' => 'size',
                'nameAttribute' => 'name',
            ],
            [
                'class' => UploadBehavior::class,
                'attribute' => 'videos',
                'multiple' => true,
                'uploadRelation' => 'schoolVideos',
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
                        'schools/update',
                        'schools/index',
                    ],
                ],
            ],

        ];
    }


}
