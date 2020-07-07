<?php

namespace backend\models\base;

use Yii;
use backend\models\Cities;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "requests".
 *
 * @property integer $id
 * @property integer $model_name
 * @property integer $model_id
 * @property integer $model_parent_id
 * @property integer $request_by_role
 * @property integer $student_id
 * @property integer $requester_id
 * @property string $request_notes
 * @property string $admin_notes
 * @property string $student_first_name
 * @property string $student_last_name
 * @property integer $student_gender
 * @property string $student_email
 * @property string $student_mobile
 * @property integer $student_country_id
 * @property integer $student_city_id
 * @property integer $student_state_id
 * @property integer $student_nationality_id
 * @property string $accomodation_option
 * @property double $accomodation_option_cost
 * @property string $airport_pickup
 * @property string $airport_pickup_cost
 * @property string $course_start_date
 * @property integer $number_of_weeks
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $created_by
 * @property string $updated_by
 *
 * @property \backend\models\Country $studentCountry
 * @property \backend\models\State $studentCity
 * @property \backend\models\User $requester
 */
class Requests extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * This function helps \mootensai\relation\RelationTrait runs faster
     * @return array relation names of this model
     */
    public function relationNames()
    {
        return [
            'studentCountry',
            'studentCity',
            'requester',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model_id', 'requester_id', 'status'], 'required'],
            [['model_id', 'model_parent_id', 'student_id', 'requester_id', 'student_country_id', 'student_city_id', 'student_state_id', 'number_of_weeks'], 'integer'],
            [['request_notes', 'admin_notes', 'student_nationality_id'], 'string'],
            [['accomodation_option_cost'], 'number'],
            [['model_name', 'request_by_role', 'student_gender', 'status'], 'string', 'max' => 4],
            [['student_first_name', 'student_last_name', 'student_email', 'student_mobile', 'accomodation_option', 'airport_pickup', 'airport_pickup_cost', 'course_start_date', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'requests';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'model_name' => Yii::t('backend', 'Program/Course'),
            'model_id' => Yii::t('backend', 'Model ID'),
            'model_parent_id' => Yii::t('backend', 'University/School'),
            'request_by_role' => Yii::t('backend', 'Requested By'),
            'student_id' => Yii::t('backend', 'Student'),
            'requester_id' => Yii::t('backend', 'Request Owner'),
            'request_notes' => Yii::t('backend', 'Request Notes'),
            'admin_notes' => Yii::t('backend', 'Admin Notes'),
            'student_first_name' => Yii::t('backend', 'Student First Name'),
            'student_last_name' => Yii::t('backend', 'Student Last Name'),
            'student_gender' => Yii::t('backend', 'Student Gender'),
            'student_email' => Yii::t('backend', 'Student Email'),
            'student_mobile' => Yii::t('backend', 'Student Mobile'),
            'student_country_id' => Yii::t('backend', 'Student Country'),
            'student_city_id' => Yii::t('backend', 'Student State'),
            'student_nationality_id' => Yii::t('backend', 'Nationality'),
            'accomodation_option' => Yii::t('backend', 'Accomodation Option'),
            'accomodation_option_cost' => Yii::t('backend', 'Accomodation Option Cost'),
            'airport_pickup' => Yii::t('backend', 'Airport Pickup'),
            'airport_pickup_cost' => Yii::t('backend', 'Airport Pickup Cost'),
            'course_start_date' => Yii::t('backend', 'Course Start Date'),
            'number_of_weeks' => Yii::t('backend', 'Number Of Weeks'),
            'status' => Yii::t('backend', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModelObj()
    {
        if ($this->model_name == \backend\models\Requests::MODEL_NAME_PROGRAM) {
            return $this->hasOne(\backend\models\UniversityPrograms::className(), ['id' => 'model_id']);
        } else {
            return $this->hasOne(\backend\models\SchoolCourse::className(), ['id' => 'model_id']);
        }
    }

    public function getModelParentObj()
    {
        if ($this->model_name == \backend\models\Requests::MODEL_NAME_PROGRAM) {
            return $this->hasOne(\backend\models\University::className(), ['id' => 'model_parent_id']);
        } else {
            return $this->hasOne(\backend\models\Schools::className(), ['id' => 'model_parent_id']);
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentNationality()
    {
        return $this->hasOne(\backend\models\Country::className(), ['id' => 'student_nationality_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentCountry()
    {
        return $this->hasOne(\backend\models\Country::className(), ['id' => 'student_country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentCity()
    {
        return $this->hasOne(\backend\models\State::className(), ['id' => 'student_state_id']);
    }
    public function getCity()
    {
        return $this->hasOne(\backend\models\Cities::className(), ['id' => 'student_city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequester()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'requester_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUniversity()
    {
        return $this->hasOne(\backend\models\University::className(), ['id' => 'model_parent_id']);
    }
    public function getProgram()
    {
        return $this->hasOne(\backend\models\UniversityPrograms::className(), ['id' => 'model_id']);
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
     * @return \backend\models\activequery\RequestsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\activequery\RequestsQuery(get_called_class());
    }
}
