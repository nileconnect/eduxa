<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "school_course_study_language".
 *
 * @property integer $id
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 */
class SchoolCourseStudyLanguage extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['created_by', 'updated_by'], 'integer'],
            [['title', 'created_at', 'updated_at'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'school_course_study_language';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
        ];
    }


    /**
     * @inheritdoc
     * @return \backend\models\activequery\SchoolCourseStudyLanguageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\activequery\SchoolCourseStudyLanguageQuery(get_called_class());
    }
}
