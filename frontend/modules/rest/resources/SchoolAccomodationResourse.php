<?php

namespace frontend\modules\rest\resources;
use backend\models\Cities;
use backend\models\SchoolAccomodation;

class SchoolAccomodationResourse extends SchoolAccomodation
{
    public function fields()
    {
        return [
            'id',
            'title',
            'reg_fees'=>function($model){
                return $model->fees ;
            },

            'facility'=>function($model){
                return $model->facility->title ;
            },
            'room'=>function($model){
                return $model->room->title ;
            },
            'special_diet',

            'booking_cycle'=>function($model){
                return   SchoolAccomodation::BookingCycleList()[ $model->booking_cycle] ;
            },

            'min_booking_duraion',
            'max_age',
            'distance_from_school',
            'cost_per_duration_unit'


        ];
    }


}
