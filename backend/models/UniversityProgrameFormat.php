<?php

namespace backend\models;

use Yii;
use \backend\models\base\UniversityProgrameFormat as BaseUniversityProgrameFormat;

/**
 * This is the model class for table "university_programe_format".
 */
class UniversityProgrameFormat extends BaseUniversityProgrameFormat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return 
	    [
            [['title'], 'required'],
            [['title'], 'unique'],
            [['created_by', 'updated_by'], 'integer'],
            [[ 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 30 ,'min'=>2],
            [['status'], 'integer']
        ];
    }
	
}
