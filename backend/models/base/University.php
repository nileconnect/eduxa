<?php

namespace backend\models\base;

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
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'country',
            'city',
            'universityAccreditedCountries',
            'universityPhotos',
            'universityPrograms',
            'universityVideos',
            'unversityRatings'
        ];
    }

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
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'title' => Yii::t('backend', 'Title'),
            'image_base_url' => Yii::t('backend', 'Image Base Url'),
            'image_path' => Yii::t('backend', 'Image Path'),
            'description' => Yii::t('backend', 'Description'),
            'detailed_address' => Yii::t('backend', 'Detailed Address'),
            'location' => Yii::t('backend', 'Location'),
            'city_id' => Yii::t('backend', 'City'),
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
        return $this->hasOne(\backend\models\City::className(), ['id' => 'city_id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUniversityAccreditedCountries()
    {
        return $this->hasMany(\backend\models\UniversityAccreditedCountries::className(), ['university_id' => 'id']);
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
    


    /**
     * @inheritdoc
     * @return \backend\models\activequery\UniversityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\activequery\UniversityQuery(get_called_class());
    }
}
