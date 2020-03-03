<?php

namespace backend\models\base;

use trntv\filekit\behaviors\UploadBehavior;
use webvimark\behaviors\multilanguage\MultiLanguageBehavior;
use webvimark\behaviors\multilanguage\MultiLanguageTrait;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "university".
 *
 * @property integer $id
 * @property string $title
 * @property string $image_base_url
 * @property string $image_path
 * @property string $description
 * @property string $detailed_address
 * @property integer $country_id
 * @property integer $status
 * @property integer $responsible_id
 * @property integer $city_id
 * @property string $location
 * @property string $lat
 * @property string $lng
 * @property double $total_rating
 * @property integer $no_of_ratings
 * @property integer $recommended
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property \backend\models\UniversityAccreditedCountries[] $universityAccreditedCountries
 * @property \backend\models\UniversityPhotos[] $universityPhotos
 * @property \backend\models\UniversityPrograms[] $universityPrograms
 * @property \backend\models\UniversityVideos[] $universityVideos
 * @property \backend\models\UniversityRating[] $unversityRatings
 */
class University extends \yii\db\ActiveRecord
{
    use MultiLanguageTrait;

    use \mootensai\relation\RelationTrait;

    public $logo;
    public $photos;

    const STATUS_OFF = 0;
    const STATUS_ON = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'university';
    }

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
            [['logo','photos','country_id','city_id','recommended'],'safe']
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
                    'attributes'       => ['title','description','detailed_address'],
                    'admin_routes'     => [
                        'university/update',
                        'university/index',
                    ],
                ],
            ],

        ];
    }

    public function CalcRating()
    {
        $ratingCount = count($this->unversityRatings);
        if($ratingCount < 1) return true  ;

        $rating_sum  = $this->unversityRatingsSum;
        $this->no_of_ratings = $ratingCount ;
        $this->total_rating = number_format($rating_sum/$ratingCount , 0);
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


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'title' => Yii::t('backend', 'University Name'),
            'image_base_url' => Yii::t('backend', 'Image Base Url'),
            'image_path' => Yii::t('backend', 'Image Path'),
            'description' => Yii::t('backend', 'Description'),
            'detailed_address' => Yii::t('backend', 'Detailed Address'),
            'location' => Yii::t('backend', 'Location'),
            'city_id' => Yii::t('backend', 'City'),
            'state_id' => Yii::t('backend', 'State'),
            'country_id' => Yii::t('backend', 'Country'),
            'lat' => Yii::t('backend', 'Lat'),
            'lng' => Yii::t('backend', 'Lng'),
            'total_rating' => Yii::t('backend', 'Total Rating'),
            'no_of_ratings' => Yii::t('backend', 'No Of Ratings'),
            'recommended' => Yii::t('backend', 'Recommended'),
            'responsible_id' => Yii::t('backend', 'University Manager'),
        ];
    }


    public function getCountry()
    {
        return $this->hasOne(\backend\models\Country::className(), ['id' => 'country_id']);
    }

    public function getResponsible()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'responsible_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(\backend\models\Cities::className(), ['id' => 'city_id']);
    }

    public function getState()
    {
        return $this->hasOne(\backend\models\State::className(), ['id' => 'state_id']);
    }

    public function getUniversityCountries()
    {
        return $this->hasMany(\backend\models\UniversityCountries::className(), ['university_id' => 'id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUniversityPhotos()
    {
        return $this->hasMany(\backend\models\UniversityPhotos::className(), ['university_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUniversityPrograms()
    {
        return $this->hasMany(\backend\models\UniversityPrograms::className(), ['university_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUniversityVideos()
    {
        return $this->hasMany(\backend\models\UniversityVideos::className(), ['university_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnversityRatings()
    {
        return $this->hasMany(\backend\models\UniversityRating::className(), ['university_id' => 'id']);
    }

    public function getUnversityRatingsSum()
    {
        return $this->hasMany(\backend\models\UniversityRating::className(), ['university_id' => 'id'])->sum('rating');
    }


    /**
     * @inheritdoc
     * @return \backend\models\activequery\UniversityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\activequery\UniversityQuery(get_called_class());
    }
}
