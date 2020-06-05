<?php

namespace frontend\modules\rest\resources;
use backend\models\SchoolAirportPickup;

class SchoolAirportsResourse extends SchoolAirportPickup
{
    public function fields()
    {
        return [
            'id',
            'title',
            'service_type'=>function($model){
                return SchoolAirportPickup::AirePorPickuptList()[$model->service_type] ;
            },
            'cost'


        ];
    }


}
