<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "school_airport_pickup".
 *
 * @property integer $id
 * @property integer $school_id
 * @property string $title
 * @property integer $service_type
 * @property double $cost
 *
 * @property \backend\models\Schools $school
 */
class SchoolAirportPickup extends \yii\db\ActiveRecord
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
            [['school_id', 'title', 'cost'], 'required'],
            [['school_id'], 'integer'],
            [['cost'], 'number'],
            [['title'], 'string', 'max' => 255],
            [['service_type'], 'string', 'max' => 4]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'school_airport_pickup';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'school_id' => Yii::t('backend', 'School ID'),
            'title' => Yii::t('backend', 'Title'),
            'service_type' => Yii::t('backend', 'Service Type'),
            'cost' => Yii::t('backend', 'Cost'),
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
     * @return \backend\models\activequery\SchoolAirportPickupQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\activequery\SchoolAirportPickupQuery(get_called_class());
    }
}
