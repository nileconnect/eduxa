<?php

namespace backend\models;

use common\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "faq".
 *
 * @property int $id
 * @property int $country_id
 * @property string $question
 * @property string $answer
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property string $created_at
 * @property string $updated_at
 *
 * @property FaqCat $cat
 */
class Faq extends \yii\db\ActiveRecord
{
    const STATUS_NOT_PUBLISHED =0;
    const STATUS_PUBLISHED =1;
    const CAT_TYP_GENERAL =1;


    public static function getStatusList()
    {
        return [
            self::STATUS_PUBLISHED => Yii::t('app', 'Published'),
            self::STATUS_NOT_PUBLISHED =>Yii::t('app', 'Not Published'),
        ];
    }


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faq';
    }


    public function behaviors() {
        return [

          'blameable' => [
                                  'class' =>BlameableBehavior::className(),
                        ],

                [
                    'class' => TimestampBehavior::className(),
                    //'createdAtAttribute' => 'create_time',
                    //'updatedAtAttribute' => 'update_time',
                    'value' => date("Y-m-d H:i:s"),
                ],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country_id', 'question'], 'required'],
            ['answer' , 'required','on'=>'AdminChange'],
            [['country_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['answer'], 'string'],
            [['question', 'created_at', 'updated_at','note'], 'string', 'max' => 255],
           // [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => FaqCat::className(), 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'country_id' => Yii::t('app', 'Cat ID'),
            'question' => Yii::t('app', 'question'),
            'answer' => Yii::t('app', 'Answer'),
            'status' => Yii::t('app', 'Status'),
            'created_by' => Yii::t('app', 'Added By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'note' => Yii::t('app', 'Note'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    public function getCreatedBy() {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    public function getUpdatedBy() {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

}
