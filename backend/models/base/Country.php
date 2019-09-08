<?php

namespace backend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "country".
 *
 * @property integer $id
 * @property string $title
 * @property string $code
 * @property string $image_base_url
 * @property string $image_path
 * @property string $intro
 * @property string $details
 *
 * @property \backend\models\CountryAttachment[] $countryAttachments
 */
class Country extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'countryAttachments'
        ];
    }

    /**
     * @inheritdoc
     */


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'title' => Yii::t('backend', 'Title'),
            'code' => Yii::t('backend', 'Code'),
            'image_base_url' => Yii::t('backend', 'Image Base Url'),
            'image_path' => Yii::t('backend', 'Image Path'),
            'intro' => Yii::t('backend', 'Intro'),
            'details' => Yii::t('backend', 'Details'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountryAttachments()
    {
        return $this->hasMany(\backend\models\CountryAttachment::className(), ['country_id' => 'id']);
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */

    /**
     * @inheritdoc
     * @return \backend\models\activequery\CountryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\activequery\CountryQuery(get_called_class());
    }
}
