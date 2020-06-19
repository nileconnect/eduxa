<?php

namespace backend\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use webvimark\behaviors\multilanguage\MultiLanguageTrait;
use webvimark\behaviors\multilanguage\MultiLanguageBehavior;
use \backend\models\base\SchoolCourseStudyLanguage as BaseSchoolCourseStudyLanguage;

/**
 * This is the model class for table "school_course_study_language".
 */
class SchoolCourseStudyLanguage extends BaseSchoolCourseStudyLanguage
{
   
    use MultiLanguageTrait;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['title'], 'required'],
            [['created_by', 'updated_by'], 'integer'],
            [['title'], 'string', 'max' => 30,'min'=>2],
        ]);
    }
	
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],

            'mlBehavior'=>[
                'class' => MultiLanguageBehavior::className(),
                'mlConfig' => [
                    'db_table' => 'translations_with_string',
                    'attributes' => ['title'],
                    'admin_routes' => [
                        'school-course-study-language/update',
                        'school-course-study-language/index',
                    ],
                ],
            ],
        ];
    }
}
