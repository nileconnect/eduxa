<?php

namespace backend\models;

use Yii;
use \backend\models\base\SchoolAccomodation as BaseSchoolAccomodation;

/**
 * This is the model class for table "school_accomodation".
 */
class SchoolAccomodation extends BaseSchoolAccomodation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return 
	    [
            [['school_id', 'title', 'fees','facility_id','room_cat_id','special_diet'
            ,'booking_cycle','min_booking_duraion','max_age','distance_from_school','cost_per_duration_unit'], 'required'],
            [['school_id', 'min_booking_duraion', 'max_age','room_cat_id','special_diet'], 'integer'],
            [['distance_from_school', 'cost_per_duration_unit','fees','min_booking_duraion'], 'number'],
            [['title'], 'string', 'max' => 30 ,'min'=>1],
            ['fees', 'compare', 'compareValue' => 999999, 'operator' => '<=', 'type' => 'number'],
            [['min_booking_duraion','max_age'], 'compare', 'compareValue' => 999, 'operator' => '<=', 'type' => 'number'],
            [['distance_from_school','cost_per_duration_unit'], 'compare', 'compareValue' => 9999, 'operator' => '<=', 'type' => 'number'],
            [['min_booking_duraion','max_age','fees','distance_from_school','cost_per_duration_unit'], 'number','min'=>1],

            [['booking_cycle'], 'string', 'max' => 4],
            [['special_diet'], 'string']
        ];
    }

    public  static function  BookingCycleList(){
        return [
            \backend\models\Schools::BOOKING_WEEKLY =>  Yii::t('frontend','Weekly'),
            \backend\models\Schools::BOOKING_MONTHLY=>  Yii::t('frontend','Monthly')
        ];
    }


}
