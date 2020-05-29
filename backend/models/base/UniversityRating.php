<?php

namespace backend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "university_rating".
 *
 * @property integer $id
 * @property integer $university_id
 * @property integer $user_id
 * @property string $name
 * @property string $comment
 * @property double $rating
 * @property integer $status
 * @property string $ceated_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property \backend\models\University $university
 */
class UniversityRating extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'university'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['university_id', 'rating'], 'required'],
            [['university_id', 'user_id', 'created_by', 'updated_by'], 'integer'],
            [['comment'], 'string'],
            [['rating'], 'number'],
            [['name', 'created_at', 'updated_at'], 'string', 'max' => 255],
 [['status'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'university_rating';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'university_id' => Yii::t('backend', 'University ID'),
            'user_id' => Yii::t('backend', 'User ID'),
            'name' => Yii::t('backend', 'Name'),
            'comment' => Yii::t('backend', 'Comment'),
            'rating' => Yii::t('backend', 'Rating'),
            'status' => Yii::t('backend', 'Status'),
            'created_at' => Yii::t('backend', 'Created At'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUniversity()
    {
        return $this->hasOne(\backend\models\University::className(), ['id' => 'university_id']);
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
        ];
    }


    /**
     * @inheritdoc
     * @return \backend\models\activequery\UniversityRatingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\activequery\UniversityRatingQuery(get_called_class());
    }
}
