<?php

namespace backend\models;

use Yii;
use \backend\models\base\Newsletter as BaseNewsletter;

/**
 * This is the model class for table "newsletter".
 */
class Newsletter extends BaseNewsletter
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return 
	    [
            [['email'], 'required'],
            [['email'], 'unique'],
            [['email', 'created_at', 'updated_at'], 'string', 'max' => 255]
        ];
    }
	
}
