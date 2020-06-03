<?php

namespace frontend\modules\rest\resources;
use backend\models\Cities;

class CityResourse extends Cities
{
    public function fields()
    {
        return [
            'id',
            'title'
        ];
    }


}
