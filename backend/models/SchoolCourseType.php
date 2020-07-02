<?php

namespace backend\models;

use Yii;
use \backend\models\base\SchoolCourseType as BaseSchoolCourseType;
use webvimark\behaviors\multilanguage\MultiLanguageBehavior;
use webvimark\behaviors\multilanguage\MultiLanguageTrait;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "school_course_type".
 */
class SchoolCourseType extends BaseSchoolCourseType
{
    use MultiLanguageTrait;
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
            [['title'], 'string', 'max' => 30,'min'=>2],
        ];
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
                            'school-course-type/update',
                            'school-course-type/index',
                    ],
                ],
            ],
        ];
    }
	
}
