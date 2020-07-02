<?php

namespace backend\models;

use webvimark\behaviors\multilanguage\MultiLanguageBehavior;
use webvimark\behaviors\multilanguage\MultiLanguageTrait;
use Yii;
use \backend\models\base\SchoolCourse as BaseSchoolCourse;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
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

    const COST_PER_WEEK = 1;
    const COST_PER_SESSION = 2;

    const SCENARIO_IMPORT = 'import';

    public $title_ar;
    public $information_ar;
    public $requirments_ar;

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

    public static function costType(){
        return [
            self::COST_PER_WEEK => Yii::t('backend','Cost Per Week') ,
            self::COST_PER_SESSION => Yii::t('backend','Cost Per Session'),
        ];
    }

    public function rules()
    {
        return [
            [['title'], 'unique'],
            [['school_id', 'title','school_course_type_id','school_course_study_language_id','cost_type','status'
            ,'min_age','required_level','time_of_course','study_books_fees','registeration_fees','discount','lessons_per_week',
            'lesson_duration','max_no_of_students_per_class','information','requirments','avg_no_of_students_per_class'],
            'required'],
            [['school_id', 'lessons_per_week', 'min_no_of_students_per_class', 'min_age', 'created_by',
                'updated_by','pricing_method','school_course_type_id','school_course_study_language_id','cost_type'],
                'integer'],
            [['information', 'requirments','slug'], 'string'],
            [['title','title_ar'], 'string', 'max' => 50, 'min'=>2],
            [['lesson_duration'], 'string', 'max' => 50, 'min'=>1],
            [['information','requirments','information_ar','requirments_ar'], 'string', 'max' => 5000, 'min'=>1],
            
            ['min_age', 'compare', 'compareValue' => 999, 'operator' => '<=', 'type' => 'number'],
            [['min_age','study_books_fees','registeration_fees','discount','lessons_per_week','max_no_of_students_per_class',
                'avg_no_of_students_per_class'],'number','min'=>1],
            ['title_ar','safe','on'=>self::SCENARIO_IMPORT],
            ['status','number'],
            [['information','requirments','study_books_fees','title_ar','information_ar','requirments_ar'],'safe']
        ];
    }


    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::class,
                'attribute' => 'title',
                'immutable' => true,
            ],
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


    public function getMinimumPrice(){
        $price=0;
        if($this->cost_type == self::COST_PER_WEEK){
            $price = SchoolCourseWeekCost::find()->where(['school_course_id'=>$this->id])->min('cost');
        }
        if($this->cost_type == self::COST_PER_SESSION){
            $price = SchoolCourseSessionCost::find()->where(['school_course_id'=>$this->id])->min('week_cost');
        }
        return $price;
    }


}
