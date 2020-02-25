<?php

namespace backend\models;

use Yii;
use \backend\models\base\Cities as BaseCities;

/**
 * This is the model class for table "cities".
 */
class Cities extends BaseCities
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['state_id', 'title'], 'required'],
            [['state_id', 'sort'], 'integer'],
            [['title'], 'string', 'max' => 255]
        ]);
    }
	
}
