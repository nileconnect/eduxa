<?php

namespace backend\models;

use Yii;
use \backend\models\base\CountryAttachment as BaseCountryAttachment;

/**
 * This is the model class for table "country_attachment".
 */
class CountryAttachment extends BaseCountryAttachment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_id', 'path'], 'required'],
            [['country_id', 'size', 'order'], 'integer'],
            [['path', 'base_url', 'type', 'name'], 'string', 'max' => 255]
        ];
    }


}
