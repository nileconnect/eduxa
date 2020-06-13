<?php

namespace backend\models;

use Yii;
use \backend\models\base\UniversityPrograms as BaseUniversityPrograms;

/**
 * This is the model class for table "university_programs".
 */
class UniversityPrograms extends BaseUniversityPrograms
{

    const SCENARIO_IMPORT= 'import';

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['university_id', 'title', 'major_id', 'degree_id','lang_of_study','medium_of_study','degree_id','field_id','high_school_transcript','bachelor_degree'
            ,'study_duration','study_duration_no','study_method','program_format','conditional_admissions','ielts','bank_statment','annual_cost','toefl'], 'required'],

            [['title','high_school_transcript', 'bachelor_degree'], 'string', 'max' => 30,'min'=>2],

            [[ 'major_id', 'degree_id', 'field_id', 'country_id', 'city_id', 'created_by', 'updated_by',
                'last_submission_date_active','medium_of_study','program_format','lang_of_study', 'study_method','conditional_admissions',  'study_duration',  'ielts'], 'integer'],
            [['annual_cost', 'total_rating','annual_cost','bank_statment','toefl','study_duration_no'], 'number'],
            [['note1', 'note2','slug'], 'string'],
            [[ 'study_start_date','attendance_type',
                 'certificate', 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['program_type','last_submission_date','first_submission_date','lang_of_study','university_id'], 'safe'],
            ['last_submission_date','safe','on'=>'import']
        ];
    }
}
