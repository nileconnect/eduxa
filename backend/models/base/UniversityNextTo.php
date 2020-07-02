<?php

namespace backend\models\base;

use webvimark\behaviors\multilanguage\MultiLanguageBehavior;
use webvimark\behaviors\multilanguage\MultiLanguageTrait;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "university_next_to".
 *
 * @property integer $id
 * @property integer $university_id
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \backend\models\University $university
 */
class UniversityNextTo extends \yii\db\ActiveRecord
{
    use MultiLanguageTrait;

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['university_id'], 'required'],
//            [['university_id'], 'integer'],
            [['title', 'created_at', 'updated_at'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'university_next_to';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'university_id' => Yii::t('backend', 'University'),
            'title' => Yii::t('backend', 'Title'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUniversity()
    {
        return $this->hasOne(\backend\models\University::className(), ['next_to' => 'id']);
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
                        'university-next-to/update',
                        'university-next-to/create',
                    ],
                ],
            ],

        ];
    }


    /**
     * @inheritdoc
     * @return \backend\models\activequery\UniversityNextToQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\activequery\UniversityNextToQuery(get_called_class());
    }
}
