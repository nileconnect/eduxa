<?php

namespace backend\models;

use Yii;
use \backend\models\base\UniversityProgramMajors as BaseUniversityProgramMajors;

/**
 * This is the model class for table "university_program_majors".
 */
class UniversityProgramMajors extends BaseUniversityProgramMajors
{
    const STATUS_OFF = 0;
    const STATUS_ON = 1;
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

    public static function StatusList(){
        return [
            self::STATUS_ON =>'Active',
            self::STATUS_OFF =>'Not Active' ,

        ];
    }



}
