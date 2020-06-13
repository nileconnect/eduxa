<?php

namespace backend\models;

use webvimark\behaviors\multilanguage\MultiLanguageBehavior;
use webvimark\behaviors\multilanguage\MultiLanguageTrait;
use Yii;
use \backend\models\base\UniversityProgramMajors as BaseUniversityProgramMajors;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "university_program_majors".
 */
class UniversityProgramMajors extends BaseUniversityProgramMajors
{
    use MultiLanguageTrait;

    const STATUS_OFF = 0;
    const STATUS_ON = 1;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['created_by', 'updated_by'], 'integer'],
            [[ 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 50 ,'min'=>2],
            [['status'], 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'title' => Yii::t('backend', 'Title'),
            'status' => Yii::t('backend', 'Status'),
        ];
    }

    public function getUniversityPrograms()
    {
        return $this->hasMany(\backend\models\UniversityPrograms::className(), ['major_id' => 'id']);
    }

    public static function StatusList(){
        return [
            self::STATUS_ON =>'Active',
            self::STATUS_OFF =>'Not Active' ,

        ];
    }
    /**
     * @inheritdoc
     * @return array mixed
     */
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
                    'db_table'         => 'translations_with_string',
                    'attributes'       => ['title'],
                    'admin_routes'     => [
                        'university-program-majors/update',
                        'university-program-majors/index',
                    ],
                ],
            ],
        ];
    }



}
