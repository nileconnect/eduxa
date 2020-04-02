<?php

namespace backend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "student_certificate".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $certificate_name
 * @property integer $year
 * @property string $grade
 * @property string $university_or_school
 * @property integer $country_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \backend\models\User $user
 */
class StudentCertificate extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'user'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'year', 'country_id'], 'integer'],
            [['certificate_name', 'grade', 'university_or_school', 'created_at', 'updated_at'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student_certificate';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'user_id' => Yii::t('backend', 'User ID'),
            'certificate_name' => Yii::t('backend', 'Certificate Name'),
            'year' => Yii::t('backend', 'Year'),
            'grade' => Yii::t('backend', 'Grade'),
            'university_or_school' => Yii::t('backend', 'University Or School'),
            'country_id' => Yii::t('backend', 'Country ID'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\backend\models\User::className(), ['id' => 'user_id']);
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
        ];
    }


    /**
     * @inheritdoc
     * @return \backend\models\activequery\StudentCertificateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\activequery\StudentCertificateQuery(get_called_class());
    }
}
