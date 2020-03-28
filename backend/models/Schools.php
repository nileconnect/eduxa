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
    public $photos;

    const STATUS_OFF = 0;
    const STATUS_ON = 1;

    const AIRPORT_ONE_WAY = 1;
    const AIRPORT_TWO_WAY = 2;

    const BOOKING_WEEKLY= 1;
    const BOOKING_MONTHLY= 2;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['title', 'required'],
            [['country_id', 'city_id', 'state_id','min_age', 'max_students_per_class', 'avg_students_per_class',  'created_by', 'updated_by','no_of_ratings','currency_id','next_to'], 'integer'],
            [['details'], 'string'],
            [['accomodation_fees', 'registeration_fees', 'study_books_fees',  'discount', 'total_rating'], 'number'],
            [['title', 'location', 'lat', 'lng', 'image_base_url', 'image_path',  'created_at', 'updated_at','detailed_address'], 'string', 'max' => 255],
            [['featured', 'status'], 'safe'],
            [['logo','photos','no_of_ratings' ,'accomodation_reservation_fees','has_health_insurance','health_insurance_cost','detailed_address','currency_id','next_to'],'safe']
        ] ;
    }


    public static function LisStatusList(){
        return [
            self::STATUS_ON =>'Active',
            self::STATUS_OFF =>'Not Active' ,
        ];
    }


    public static function LisBookingCycle(){
        return [
            self::BOOKING_WEEKLY => Yii::t('backend','Weekly') ,
            self::BOOKING_MONTHLY =>Yii::t('backend','Monthly')  ,
        ];
    }
    public static function LisAirportWay(){
        return [
            self::AIRPORT_ONE_WAY => Yii::t('backend','One Way') ,
            self::AIRPORT_TWO_WAY =>Yii::t('backend','Two Way')  ,
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
                    'attributes'       => ['title','details'],  //,'min_age','start_every','study_time'
                    'admin_routes'     => [
                        'schools/update',
                        'schools/index',
                    ],
                ],
            ],

        ];
    }

    public function CalcRating()
    {
        $ratingCount = count($this->schoolRatings);
        $rating_sum  = $this->schoolRatingsSum;
        $this->no_of_ratings = $ratingCount ;
        if($ratingCount){
            $this->total_rating = number_format($rating_sum/$ratingCount , 0);
        }else{
            $this->total_rating = 0 ;
        }
        $this->save(false);
        return true;
    }


    public function getLogoImage(){
        if($this->image_path){
            return $this->image_base_url.$this->image_path ;
        }else{
            return   Yii::getAlias('@frontendUrl').'/img/no-logo.png' ;
        }
    }


}
