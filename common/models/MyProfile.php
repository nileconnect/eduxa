<?php

namespace common\models;

use common\models\UserProfile;
use Yii;

class MyProfile extends UserProfile
{

    public function rules()
    {
        return [
            [['firstname', 'lastname', 'gender'], 'required'],
            [['firstname', 'lastname'], 'string', 'min' => 2, 'max' => 15],
            [['gender'], 'in', 'range' => [null, self::GENDER_FEMALE, self::GENDER_MALE]],
            [['avatar_path', 'avatar_base_url', 'nationality', 'students_nationalities', 'job_title'], 'string', 'max' => 255],
            ['locale', 'default', 'value' => Yii::$app->language == 'en' ? 'en-US' : 'ar-AR'],
            ['locale', 'in', 'range' => array_keys(Yii::$app->params['availableLocales'])],
            [['picture'], 'safe'],
        ];
    }
}
