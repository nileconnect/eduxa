<?php

namespace backend\models\base;

use webvimark\behaviors\multilanguage\MultiLanguageBehavior;
use webvimark\behaviors\multilanguage\MultiLanguageTrait;
use Yii;

/**
 * This is the base model class for table "university_programs".
 *
 * @property integer $id
 * @property integer $university_id
 * @property string $title
 * @property integer $major_id
 * @property integer $degree_id
 * @property integer $field_id
 * @property integer $country_id
 * @property integer $city_id
 * @property string $study_start_date
 * @property string $study_duration
 * @property string $study_method
 * @property string $attendance_type
 * @property double $annual_cost
 * @property string $conditional_admissions
 * @property string $toefl
 * @property string $ielts
 * @property string $bank_statment
 * @property string $high_school_transcript
 * @property string $bachelor_degree
 * @property string $certificate
 * @property string $note1
 * @property string $note2
 * @property double $total_rating
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $program_type
 *
 * @property \backend\models\University $university
 * @property \backend\models\UniversityProgramMajors $major
 * @property \backend\models\UniversityProgramField $field
 * @property \backend\models\UniversityProgramDegree $degree
 */
class UniversityPrograms extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;
    use MultiLanguageTrait;



    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'university',
            'major',
            'field',
            'degree'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['university_id', 'title', 'major_id', 'degree_id'], 'required'],
            [['university_id', 'major_id', 'degree_id', 'field_id', 'country_id', 'city_id', 'created_by', 'updated_by'], 'integer'],
            [['annual_cost', 'total_rating'], 'number'],
            [['note1', 'note2'], 'string'],
            [['title', 'study_start_date', 'study_duration', 'study_method', 'attendance_type', 'conditional_admissions', 'toefl', 'ielts', 'bank_statment', 'high_school_transcript', 'bachelor_degree', 'certificate', 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['program_type'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'university_programs';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'university_id' => Yii::t('backend', 'University'),
            'title' => Yii::t('backend', 'Title'),
            'major_id' => Yii::t('backend', 'Major'),
            'degree_id' => Yii::t('backend', 'Degree'),
            'field_id' => Yii::t('backend', 'Field'),
            'country_id' => Yii::t('backend', 'Country'),
            'city_id' => Yii::t('backend', 'City'),
            'study_start_date' => Yii::t('backend', 'Begining Of Study'),
            'study_duration' => Yii::t('backend', 'Study Duration'),
            'study_method' => Yii::t('backend', 'Study Method'),
            'attendance_type' => Yii::t('backend', 'Attendance Type'),
            'annual_cost' => Yii::t('backend', 'Annual Cost'),
            'conditional_admissions' => Yii::t('backend', 'Conditional Admissions'),
            'toefl' => Yii::t('backend', 'Toefl'),
            'ielts' => Yii::t('backend', 'Ielts'),
            'bank_statment' => Yii::t('backend', 'Bank Statment'),
            'high_school_transcript' => Yii::t('backend', 'High School Transcript'),
            'bachelor_degree' => Yii::t('backend', 'Bachelor Degree'),
            'certificate' => Yii::t('backend', 'Certificate'),
            'note1' => Yii::t('backend', 'Note1'),
            'note2' => Yii::t('backend', 'Note2'),
            'total_rating' => Yii::t('backend', 'Total Rating'),
            'program_type' => Yii::t('backend', 'Program Type'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUniversity()
    {
        return $this->hasOne(\backend\models\University::className(), ['id' => 'university_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMajor()
    {
        return $this->hasOne(\backend\models\UniversityProgramMajors::className(), ['id' => 'major_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getField()
    {
        return $this->hasOne(\backend\models\UniversityProgramField::className(), ['id' => 'field_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDegree()
    {
        return $this->hasOne(\backend\models\UniversityProgramDegree::className(), ['id' => 'degree_id']);
    }


    /**
     * @inheritdoc
     * @return \backend\models\activequery\UniversityProgramsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\activequery\UniversityProgramsQuery(get_called_class());
    }

    public function behaviors()
    {
        return [
            'mlBehavior'=>[
                'class'    => MultiLanguageBehavior::className(),
                'mlConfig' => [
                    'db_table'         => 'translations_with_text',
                    'attributes'       => ['title','study_duration','study_method','attendance_type','annual_cost','conditional_admissions','toefl'
                                            ,'ielts','bank_statment','high_school_transcript','bachelor_degree','certificate','note1','note2'],
                    'admin_routes'     => [
                        'university-program/update',
                        'university-program/index',
                    ],
                ],
            ],
        ];
    }
}
