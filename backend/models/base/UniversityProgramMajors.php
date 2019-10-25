<?php

namespace backend\models\base;

use webvimark\behaviors\multilanguage\MultiLanguageBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "university_program_majors".
 *
 * @property integer $id
 * @property string $title
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property \backend\models\UniversityPrograms[] $universityPrograms
 */
class UniversityProgramMajors extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'universityPrograms'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['created_by', 'updated_by'], 'integer'],
            [['title', 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['status'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'university_program_majors';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'title' => Yii::t('backend', 'Title'),
            'status' => Yii::t('backend', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUniversityPrograms()
    {
        return $this->hasMany(\backend\models\UniversityPrograms::className(), ['major_id' => 'id']);
    }



    /**
     * @inheritdoc
     * @return \backend\models\activequery\UniversityProgramMajorsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\activequery\UniversityProgramMajorsQuery(get_called_class());
    }
}
