<?php

namespace backend\models;

use webvimark\behaviors\multilanguage\MultiLanguageBehavior;
use webvimark\behaviors\multilanguage\MultiLanguageTrait;
use Yii;
use \backend\models\base\UniversityProgramDegree as BaseUniversityProgramDegree;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "university_program_degree".
 */
class UniversityProgramDegree extends BaseUniversityProgramDegree
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
            [['title', 'created_at', 'updated_at'], 'string', 'max' => 255]
        ]);
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
                        'university-program-degree/update',
                        'university-program-degree/index',
                    ],
                ],
            ],
        ];
    }
}
