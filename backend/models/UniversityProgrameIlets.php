<?php

namespace backend\models;

use Yii;
use \backend\models\base\UniversityProgrameIlets as BaseUniversityProgrameIlets;

/**
 * This is the model class for table "university_programe_ilets".
 */
class UniversityProgrameIlets extends BaseUniversityProgrameIlets
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['title'], 'required'],
            [['created_by', 'updated_by'], 'integer'],
            [['title', 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 4]
        ]);
    }
	
}