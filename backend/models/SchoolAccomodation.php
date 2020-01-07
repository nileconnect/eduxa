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
            [['school_id', 'min_booking_duraion', 'min_age', 'max_age'], 'integer'],
            [['distance_from_school', 'cost_per_duration_unit'], 'number'],
            [['title', 'room_size'], 'string', 'max' => 255],
            [['booking_cycle'], 'string', 'max' => 4]
        ]);
    }
	
}
