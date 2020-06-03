<?php

namespace frontend\modules\rest\resources;

use backend\models\Country;

class CountryResourse extends Country
{
    public function fields()
    {
        return [
            'id',
            'title'
        ];
    }


}
