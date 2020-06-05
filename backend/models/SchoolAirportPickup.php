<?php

namespace backend\models;

use Yii;
use \backend\models\base\SchoolAirportPickup as BaseSchoolAirportPickup;

/**
 * This is the model class for table "school_airport_pickup".
 */
class SchoolAirportPickup extends BaseSchoolAirportPickup
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['school_id', 'title', 'cost'], 'required'],
            [['school_id'], 'integer'],
            [['cost'], 'number'],
            [['title'], 'string', 'max' => 255],
            [['service_type'], 'string', 'max' => 4]
        ]);
    }

    public static function AirePorPickuptList(){
      return   [\backend\models\Schools::AIRPORT_ONE_WAY =>'One Way', \backend\models\Schools::AIRPORT_TWO_WAY => 'Two Way'];
    }
	
}
