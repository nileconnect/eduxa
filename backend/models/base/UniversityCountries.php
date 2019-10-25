<?php

namespace backend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "university_countries".
 *
 * @property integer $id
 * @property integer $university_id
 * @property integer $country_id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property \backend\models\University $university
 */
class UniversityCountries extends \yii\db\ActiveRecord
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
            [['university_id'], 'required'],
            [['university_id', 'country_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'university_countries';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'university_id' => Yii::t('backend', 'University ID'),
            'country_id' => Yii::t('backend', 'Country ID'),
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
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(\backend\models\Country::className(), ['id' => 'country_id']);
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
     * @return \backend\models\activequery\UniversityCountriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\activequery\UniversityCountriesQuery(get_called_class());
    }
}
