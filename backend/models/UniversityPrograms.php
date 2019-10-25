<?php

namespace backend\models;

use Yii;
use \backend\models\base\UniversityPrograms as BaseUniversityPrograms;

/**
 * This is the model class for table "university_programs".
 */
class UniversityPrograms extends BaseUniversityPrograms
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['university_id', 'title', 'major_id', 'degree_id'], 'required'],
            [['university_id', 'major_id', 'degree_id', 'field_id', 'country_id', 'city_id', 'created_by', 'updated_by'], 'integer'],
            [['annual_cost', 'total_rating'], 'number'],
            [['note1', 'note2'], 'string'],
            [['title', 'study_start_date', 'study_duration', 'study_method', 'attendance_type', 'conditional_admissions', 'toefl', 'ielts',
                'bank_statment', 'high_school_transcript', 'bachelor_degree', 'certificate', 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['program_type'], 'safe']
        ]);
    }

}
