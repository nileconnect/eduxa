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
        return [
            [['university_id', 'title', 'major_id', 'degree_id'], 'required'],
            [['university_id', 'major_id', 'degree_id', 'field_id', 'country_id', 'city_id', 'created_by', 'updated_by',
                'last_submission_date_active','medium_of_study','toefl','program_format','lang_of_study'], 'integer'],
            [['annual_cost', 'total_rating','annual_cost','bank_statment','study_duration_no'], 'number'],
            [['note1', 'note2','slug'], 'string'],
            [['title', 'study_start_date', 'study_duration', 'study_method', 'attendance_type', 'conditional_admissions',  'ielts',
                'high_school_transcript', 'bachelor_degree', 'certificate', 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['program_type','last_submission_date','first_submission_date','lang_of_study'], 'safe']
        ];
    }
}
