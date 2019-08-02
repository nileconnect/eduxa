<?php

namespace backend\models;

use Yii;
use \backend\models\base\SchoolsProfile as BaseSchoolsProfile;

/**
 * This is the model class for table "schools_profile".
 */
class SchoolsProfile extends BaseSchoolsProfile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['institution_year', 'no_of_classes', 'no_students_boys', 'no_students_girls'], 'integer'],
            [['address', 'phone', 'phone_2', 'mobile', 'mobile_2', 'mailbox', 'email', 'website', 'facebook', 'youtube', 'twitter', 'instagram'], 'string', 'max' => 255]
        ]);
    }
	
}
