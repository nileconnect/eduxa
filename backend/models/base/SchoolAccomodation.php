<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "school_accomodation".
 *
 * @property integer $id
 * @property integer $school_id
 * @property string $title
 * @property integer $booking_cycle
 * @property integer $min_booking_duraion
 * @property integer $max_age
 * @property double $distance_from_school
 * @property double $cost_per_duration_unit
 *
 * @property \backend\models\Schools $school
 */
class SchoolAccomodation extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'school'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_id', 'title', 'cost_per_duration_unit'], 'required'],
            [['school_id', 'min_booking_duraion', 'max_age','room_cat_id','special_diet'], 'integer'],
            [['distance_from_school', 'cost_per_duration_unit','special_diet','fees'], 'number'],
            [['title'], 'string', 'max' => 255],
            [['booking_cycle'], 'string', 'max' => 4]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'school_accomodation';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'school_id' => Yii::t('backend', 'School ID'),
            'title' => Yii::t('backend', 'Title'),
            'booking_cycle' => Yii::t('backend', 'Booking Cycle'),
            'min_booking_duraion' => Yii::t('backend', 'Min Booking Duraion'),
            'max_age' => Yii::t('backend', 'Max Age'),
            'distance_from_school' => Yii::t('backend', 'Distance From School'),
            'cost_per_duration_unit' => Yii::t('backend', 'Cost Per Duration Unit'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchool()
    {
        return $this->hasOne(\backend\models\Schools::className(), ['id' => 'school_id']);
    }
    

    /**
     * @inheritdoc
     * @return \backend\models\activequery\SchoolAccomodationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\activequery\SchoolAccomodationQuery(get_called_class());
    }
}
