<?php

namespace frontend\modules\rest\resources;

class User extends \common\models\User
{
    public function fields()
    {
        return [
            'id',
            'username',
            'email',
            'created_at'];
    }

    public function extraFields()
    {
        return ['userProfile'];
    }
}
