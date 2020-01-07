<?php

namespace backend\models;

use webvimark\behaviors\multilanguage\MultiLanguageBehavior;
use webvimark\behaviors\multilanguage\MultiLanguageTrait;
use Yii;
use \backend\models\base\SchoolCourse as BaseSchoolCourse;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "school_course".
 */
class SchoolCourse extends BaseSchoolCourse
{
    use MultiLanguageTrait;

    /**
     * @inheritdoc
     */

    //(Beginner - intermediate - Professional )

    const COURSE_TYPE_BEGINNER = 1;
    const COURSE_TYPE_INTERMEDIATE = 2;
    const COURSE_TYPE_PROFESSIONAL = 3;

    const COURSE_TIME_MORNING = 1;
    const COURSE_TIME_EVENING = 2;



    public static function ListLevels(){
        return [
            self::COURSE_TYPE_BEGINNER => Yii::t('backend','Beginner') ,
            self::COURSE_TYPE_INTERMEDIATE =>Yii::t('backend','Intermediate')  ,
            self::COURSE_TYPE_PROFESSIONAL =>Yii::t('backend','Professional')  ,
        ];
    }

    public static function ListCourseTime(){
        return [
            self::COURSE_TIME_MORNING => Yii::t('backend','Morning') ,
            self::COURSE_TIME_EVENING =>Yii::t('backend','Evening')  ,
        ];
    }

    public function rules()
    {
        return [
            [['school_id', 'title', 'information', 'cost_per_week'], 'required'],
            [['school_id', 'lessons_per_week', 'min_no_of_students_per_class', 'avg_no_of_students_per_class', 'min_age', 'no_of_weeks', 'created_by', 'updated_by'], 'integer'],
            [['information', 'requirments'], 'string'],
            [['hours_per_week', 'registeration_fees', 'cost_per_week', 'discount'], 'number'],
            [['title', 'course_start_every', 'required_attendance_duraion', 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['required_level', 'time_of_course'], 'string', 'max' => 4],
            ['status','number'],
            [['information','requirments'],'safe']
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
                'class'    => MultiLanguageBehavior::className(),
                'mlConfig' => [
                    'db_table'         => 'translations_with_text',
                    'attributes'       => ['title','information','requirments'],
                    'admin_routes'     => [
                        'school-course/create',
                        'school-course/update',
                        'school-course/index',
                    ],
                ],
            ],
        ];
    }


}
