<?php

namespace backend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "country_attachment".
 *
 * @property integer $id
 * @property integer $country_id
 * @property string $path
 * @property string $base_url
 * @property string $type
 * @property integer $size
 * @property string $name
 * @property integer $created_at
 * @property integer $order
 *
 * @property \backend\models\Country $country
 */
class CountryAttachment extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'country'
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
        return 'country_attachment';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'country_id' => Yii::t('backend', 'Country ID'),
            'path' => Yii::t('backend', 'Path'),
            'base_url' => Yii::t('backend', 'Base Url'),
            'type' => Yii::t('backend', 'Type'),
            'size' => Yii::t('backend', 'Size'),
            'name' => Yii::t('backend', 'Name'),
            'order' => Yii::t('backend', 'Order'),
        ];
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
                'updatedAtAttribute' => false,
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }


    /**
     * @inheritdoc
     * @return \backend\models\activequery\CountryAttachmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\activequery\CountryAttachmentQuery(get_called_class());
    }
}
