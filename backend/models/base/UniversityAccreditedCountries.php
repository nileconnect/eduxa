<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "university_accredited_countries".
 *
 * @property integer $university_id
 * @property integer $country_id
 *
 * @property \backend\models\University $university
 * @property \backend\models\Country $country
 */
class UniversityAccreditedCountries extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'university',
            'country'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['university_id', 'country_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'university_accredited_countries';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
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
     * @return \backend\models\activequery\UniversityAccreditedCountriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\activequery\UniversityAccreditedCountriesQuery(get_called_class());
    }
}
