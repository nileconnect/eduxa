<?php

namespace backend\models;

use Yii;
use \backend\models\base\Currency as BaseCurrency;

/**
 * This is the model class for table "currency".
 */
class Currency extends BaseCurrency
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['conversion_rate'], 'number'],
            [['created_by', 'updated_by'], 'integer'],
            [['currency', 'currency_code', 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 4]
        ]);
    }
	
}
