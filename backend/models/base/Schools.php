<?php

namespace backend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "schools".
 *
 * @property integer $id
 * @property string $title
 * @property integer $course_type
 * @property string $details
 * @property integer $featured
 * @property string $location
 * @property string $lat
 * @property string $lng
 * @property string $image_base_url
 * @property string $image_path
 * @property integer $country_id
 * @property integer $city_id
 * @property integer $min_age
 * @property string $start_every
 * @property string $study_time
 * @property integer $max_students_per_class
 * @property integer $avg_students_per_class
 * @property integer $lessons_per_week
 * @property double $hours_per_week
 * @property double $accomodation_fees
 * @property double $registeration_fees
 * @property double $study_books_fees
 * @property double $fees_per_week
 * @property double $discount
 * @property double $total_rating
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property \backend\models\SchoolsCourseTypes $courseType
 */
class Schools extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'courseType'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['course_type', 'country_id', 'city_id', 'min_age', 'max_students_per_class', 'avg_students_per_class', 'lessons_per_week', 'created_by', 'updated_by'], 'integer'],
            [['details'], 'string'],
            [['hours_per_week', 'accomodation_fees', 'registeration_fees', 'study_books_fees', 'fees_per_week', 'discount', 'total_rating'], 'number'],
            [['title', 'location', 'lat', 'lng', 'image_base_url', 'image_path', 'start_every', 'study_time', 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['featured', 'status'], 'string', 'max' => 4]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schools';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'title' => Yii::t('backend', 'Title'),
            'course_type' => Yii::t('backend', 'Course Type'),
            'details' => Yii::t('backend', 'Details'),
            'featured' => Yii::t('backend', 'Featured'),
            'location' => Yii::t('backend', 'Location'),
            'lat' => Yii::t('backend', 'Lat'),
            'lng' => Yii::t('backend', 'Lng'),
            'image_base_url' => Yii::t('backend', 'Image Base Url'),
            'image_path' => Yii::t('backend', 'Image Path'),
            'country_id' => Yii::t('backend', 'Country ID'),
            'city_id' => Yii::t('backend', 'City ID'),
            'min_age' => Yii::t('backend', 'Min Age'),
            'start_every' => Yii::t('backend', 'Start Every'),
            'study_time' => Yii::t('backend', 'Study Time'),
            'max_students_per_class' => Yii::t('backend', 'Max Students Per Class'),
            'avg_students_per_class' => Yii::t('backend', 'Avg Students Per Class'),
            'lessons_per_week' => Yii::t('backend', 'Lessons Per Week'),
            'hours_per_week' => Yii::t('backend', 'Hours Per Week'),
            'accomodation_fees' => Yii::t('backend', 'Accomodation Fees'),
            'registeration_fees' => Yii::t('backend', 'Registeration Fees'),
            'study_books_fees' => Yii::t('backend', 'Study Books Fees'),
            'fees_per_week' => Yii::t('backend', 'Fees Per Week'),
            'discount' => Yii::t('backend', 'Discount'),
            'total_rating' => Yii::t('backend', 'Total Rating'),
            'status' => Yii::t('backend', 'Status'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseType()
    {
        return $this->hasOne(\backend\models\SchoolsCourseTypes::className(), ['id' => 'course_type']);
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
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
        ];
    }


    /**
     * @inheritdoc
     * @return \backend\models\activequery\SchoolsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\activequery\SchoolsQuery(get_called_class());
    }
}
