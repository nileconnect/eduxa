<?php

namespace backend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "translations_with_text".
 *
 * @property integer $id
 * @property string $table_name
 * @property integer $model_id
 * @property string $attribute
 * @property string $lang
 * @property string $value
 */
class TranslationsWithText extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['table_name', 'model_id', 'attribute', 'lang', 'value'], 'required'],
            [['model_id'], 'integer'],
            [['value'], 'string'],
            [['table_name', 'attribute'], 'string', 'max' => 100],
            [['lang'], 'string', 'max' => 6]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'translations_with_text';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'table_name' => Yii::t('backend', 'Table Name'),
            'model_id' => Yii::t('backend', 'Model ID'),
            'attribute' => Yii::t('backend', 'Attribute'),
            'lang' => Yii::t('backend', 'Lang'),
            'value' => Yii::t('backend', 'Value'),
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
        ];
    }


    /**
     * @inheritdoc
     * @return \backend\models\activequery\TranslationsWithTextQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\activequery\TranslationsWithTextQuery(get_called_class());
    }
}
