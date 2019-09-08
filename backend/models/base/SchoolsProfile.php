<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "schools_profile".
 *
 * @property integer $schools_id
 * @property integer $institution_year
 * @property integer $no_of_classes
 * @property integer $no_students_boys
 * @property integer $no_students_girls
 * @property string $address
 * @property string $phone
 * @property string $phone_2
 * @property string $mobile
 * @property string $mobile_2
 * @property string $mailbox
 * @property string $email
 * @property string $website
 * @property string $facebook
 * @property string $youtube
 * @property string $twitter
 * @property string $instagram
 *
 * @property \backend\models\Schools $schools
 */
class SchoolsProfile extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'schools'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['institution_year', 'no_of_classes', 'no_students_boys', 'no_students_girls'], 'integer'],
            [['address', 'phone', 'phone_2', 'mobile', 'mobile_2', 'mailbox', 'email', 'website', 'facebook', 'youtube', 'twitter', 'instagram'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schools_profile';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'schools_id' => Yii::t('backend', 'Schools ID'),
            'institution_year' => Yii::t('backend', 'Institution Year'),
            'no_of_classes' => Yii::t('backend', 'No Of Classes'),
            'no_students_boys' => Yii::t('backend', 'No Students Boys'),
            'no_students_girls' => Yii::t('backend', 'No Students Girls'),
            'address' => Yii::t('backend', 'Address'),
            'phone' => Yii::t('backend', 'Phone'),
            'phone_2' => Yii::t('backend', 'Phone 2'),
            'mobile' => Yii::t('backend', 'Mobile'),
            'mobile_2' => Yii::t('backend', 'Mobile 2'),
            'mailbox' => Yii::t('backend', 'Mailbox'),
            'email' => Yii::t('backend', 'Email'),
            'website' => Yii::t('backend', 'Website'),
            'facebook' => Yii::t('backend', 'Facebook'),
            'youtube' => Yii::t('backend', 'Youtube'),
            'twitter' => Yii::t('backend', 'Twitter'),
            'instagram' => Yii::t('backend', 'Instagram'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchools()
    {
        return $this->hasOne(\backend\models\Schools::className(), ['id' => 'schools_id']);
    }
    

    /**
     * @inheritdoc
     * @return \backend\models\activequery\SchoolsProfileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\activequery\SchoolsProfileQuery(get_called_class());
    }
}
