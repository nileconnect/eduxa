<?php

namespace backend\models\base;

use webvimark\behaviors\multilanguage\MultiLanguageBehavior;
use webvimark\behaviors\multilanguage\MultiLanguageTrait;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "school_facilities".
 *
 * @property integer $id
 * @property integer $school_id
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \backend\models\Schools $school
 */
class SchoolFacilities extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    use MultiLanguageTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_id'], 'integer'],
            [['title', 'created_at', 'updated_at'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'school_facilities';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'school_id' => Yii::t('backend', 'School ID'),
            'title' => Yii::t('backend', 'Title'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchool()
    {
        return $this->hasOne(\backend\models\Schools::className(), ['id' => 'school_id']);
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

            'mlBehavior'=>[
                'class'    => MultiLanguageBehavior::className(),
                'mlConfig' => [
                    'db_table'         => 'translations_with_text',
                    'attributes'       => ['title'],
                    'admin_routes'     => [
                        'school-facilities/update',
                        'school-facilities/index',
                    ],
                ],
            ],
        ];
    }


    /**
     * @inheritdoc
     * @return \backend\models\activequery\SchoolFacilitiesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\activequery\SchoolFacilitiesQuery(get_called_class());
    }
}
