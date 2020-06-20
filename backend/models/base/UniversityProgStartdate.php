<?php

namespace backend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "university_prog_startdate".
 *
 * @property integer $id
 * @property integer $university_prog_id
 * @property integer $m_1
 * @property integer $m_2
 * @property integer $m_3
 * @property integer $m_4
 * @property integer $m_5
 * @property integer $m_6
 * @property integer $m_7
 * @property integer $m_8
 * @property integer $m_9
 * @property integer $m_10
 * @property integer $m_11
 * @property integer $m_12
 * @property string $created_at
 * @property string $updated_at
 * @property string $created_by
 * @property string $updated_by
 *
 * @property \backend\models\UniversityPrograms $universityProg
 */
class UniversityProgStartdate extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'universityProg'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['university_prog_id'], 'integer'],
            [['m_1', 'm_2', 'm_3', 'm_4', 'm_5', 'm_6', 'm_7', 'm_8', 'm_9', 'm_10', 'm_11', 'm_12'], 'string', 'max' => 4],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'university_prog_startdate';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'university_prog_id' => Yii::t('backend', 'University Prog ID'),
            'm_1' => Yii::t('backend', 'JAN'),
            'm_2' => Yii::t('backend', 'FEB'),
            'm_3' => Yii::t('backend', 'MAR'),
            'm_4' => Yii::t('backend', 'APR'),
            'm_5' => Yii::t('backend', 'MAY'),
            'm_6' => Yii::t('backend', 'JUN'),
            'm_7' => Yii::t('backend', 'JUL'),
            'm_8' => Yii::t('backend', 'AUG'),
            'm_9' => Yii::t('backend', 'SEPT'),
            'm_10' => Yii::t('backend', 'OCT'),
            'm_11' => Yii::t('backend', 'NOV'),
            'm_12' => Yii::t('backend', 'DEC'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUniversityProg()
    {
        return $this->hasOne(\backend\models\UniversityPrograms::className(), ['id' => 'university_prog_id']);
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
     * @return \backend\models\activequery\UniversityProgStartdateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\activequery\UniversityProgStartdateQuery(get_called_class());
    }
}
