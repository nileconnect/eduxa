<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "school_course_start_date".
 *
 * @property integer $id
 * @property integer $school_course_id
 * @property string $course_date
 */
class SchoolCourseStartDate extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            ''
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_course_id', 'course_date'], 'required'],
            [['school_course_id'], 'integer'],
            [['course_date'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'school_course_start_date';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'school_course_id' => Yii::t('backend', 'School Course ID'),
            'course_date' => Yii::t('backend', 'Course Date'),
        ];
    }


    /**
     * @inheritdoc
     * @return \backend\models\activequery\SchoolCourseStartDateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\activequery\SchoolCourseStartDateQuery(get_called_class());
    }
}
