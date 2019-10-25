<?php

namespace backend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "school_rating".
 *
 * @property integer $id
 * @property integer $school_id
 * @property integer $user_id
 * @property string $name
 * @property string $comment
 * @property double $rating
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property \backend\models\Schools $school
 */
class SchoolRating extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'school'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_id', 'rating'], 'required'],
            [['school_id', 'user_id', 'created_by', 'updated_by'], 'integer'],
            [['comment'], 'string'],
            [['rating'], 'number'],
            [['name', 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 4]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'school_rating';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'school_id' => Yii::t('backend', 'School ID'),
            'user_id' => Yii::t('backend', 'User ID'),
            'name' => Yii::t('backend', 'Name'),
            'comment' => Yii::t('backend', 'Comment'),
            'rating' => Yii::t('backend', 'Rating'),
            'status' => Yii::t('backend', 'Status'),
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
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
        ];
    }


    /**
     * @inheritdoc
     * @return \backend\models\activequery\SchoolRatingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\activequery\SchoolRatingQuery(get_called_class());
    }
}
