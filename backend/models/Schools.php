<?php

namespace backend\models;

use Yii;
use \backend\models\base\Schools as BaseSchools;

/**
 * This is the model class for table "schools".
 */
class Schools extends BaseSchools
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['title'], 'required'],
            [['school_identity_number', 'city_id', 'district_id', 'stage', 'owner_id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['title', 'slug', 'email', 'admin_name', 'admin_phone', 'admin_email', 'supervisor_phone', 'owner_name', 'owner_phone', 'owner_identity', 'owner_email', 'nour_rep_phone', 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['gender', 'category', 'owner_gender', 'lock'], 'string', 'max' => 4],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
