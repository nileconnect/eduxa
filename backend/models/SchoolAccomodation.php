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
        return array_replace_recursive(parent::rules(),
	    [
            [['school_id', 'title', 'cost_per_duration_unit'], 'required'],
            [['school_id', 'min_booking_duraion', 'max_age','room_cat_id','special_diet'], 'integer'],
            [['distance_from_school', 'cost_per_duration_unit','special_diet','fees'], 'number'],
            [['title'], 'string', 'max' => 255],
            [['booking_cycle'], 'string', 'max' => 4]
        ]);
    }

    public  static function  BookingCycleList(){
        return [\backend\models\Schools::BOOKING_WEEKLY =>'Weekly', \backend\models\Schools::BOOKING_MONTHLY=> 'Monthly'];
    }


}
