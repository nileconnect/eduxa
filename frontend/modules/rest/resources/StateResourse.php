<?php

namespace frontend\modules\rest\resources;
use backend\models\State;

class StateResourse extends State
{
    public function fields()
    {
        return [
            'id',
            'title'
        ];
    }


}
