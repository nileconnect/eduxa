<?php

namespace backend\models;

use Yii;
use \backend\models\base\UniversityProgStartdate as BaseUniversityProgStartdate;

/**
 * This is the model class for table "university_prog_startdate".
 */
class UniversityProgStartdate extends BaseUniversityProgStartdate
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['university_prog_id'], 'integer'],
            [['m_1', 'm_2', 'm_3', 'm_4', 'm_5', 'm_6', 'm_7', 'm_8', 'm_9', 'm_10', 'm_11', 'm_12'], 'string', 'max' => 4],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'string', 'max' => 255]
        ]);
    }
	
}
