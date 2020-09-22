<?php

namespace common\models;

use backend\models\Cities;
use backend\models\Country;
use backend\models\Schools;
use backend\models\State;
use backend\models\University;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "user_profile".
 *
 * @property integer $user_id
 * @property integer $locale
 * @property string $firstname
 * @property string $middlename
 * @property string $lastname
 * @property string $picture
 * @property string $avatar
 * @property string $avatar_path
 * @property string $avatar_base_url
 * @property integer $gender
 *
 * @property User $user
 */
class UserProfile extends ActiveRecord
{
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;

    /**
     * @var
     */
    public $picture;
    /**
     * @var mixed|null
     */
    private $requests;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_profile}}';
    }

    public static function ListGender()
    {
        return [
            UserProfile::GENDER_FEMALE => Yii::t('backend', 'Female'),
            UserProfile::GENDER_MALE => Yii::t('backend', 'Male'),

        ];
    }

    public static function ListFindUs()
    {
        //Google, Facebook, Twitter,Instagram,print advertising,word of mouth.
        return [
            1 => Yii::t('common', 'Google'),
            2 => Yii::t('common', 'Facebook'),
            3 => Yii::t('common', 'Twitter'),
            4 => Yii::t('common', 'Instagram'),
            5 => Yii::t('common', 'print advertising'),
            6 => Yii::t('common', 'word of mouth'),

        ];
    }

    public static function ListCommunicateChannels()
    {
        return [
            1 => Yii::t('common', 'By Emails'),
            2 => Yii::t('common', 'By Mobile'),
            3 => Yii::t('common', 'By Whatsapp or SMS'),

        ];
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'picture' => [
                'class' => UploadBehavior::class,
                'attribute' => 'picture',
                'pathAttribute' => 'avatar_path',
                'baseUrlAttribute' => 'avatar_base_url',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'gender'], 'required', 'on'=>'myProfile'],
            [['firstname' ,'lastname','nationality'], 'match', 'pattern' => "/^[a-z]\w*$/i"],
            [['firstname', 'lastname', 'mobile', 'country_id', 'city_id', 'state_id', 'gender'], 'required'],
            [['nationality','communtication_channel'], 'required', 'on'=>'updateStudentProfileInFront'],
            [
                'interested_in_university','required',
                'message'=> 'you should choose University Education or Language School',
                'when' => function($model) { return $model->interested_in_schools == 0 and $model->interested_in_university == 0  ; }
                , 'on'=>'updateStudentProfileInFront'
            ],
            //'gender',
            ['nationality', 'string', 'min' => 2, 'max' => 60],
            [['firstname', 'lastname'], 'string', 'min' => 2, 'max' => 15],

            [['user_id'], 'required'],
            [['user_id', 'gender', 'country_id', 'state_id', 'city_id', 'no_of_students', 'communtication_channel'], 'integer'],
            [['gender'], 'in', 'range' => [null, self::GENDER_FEMALE, self::GENDER_MALE]],
            [['avatar_path', 'avatar_base_url', 'nationality', 'students_nationalities', 'job_title'], 'string', 'max' => 255],
            ['locale', 'default', 'value' => Yii::$app->language == 'en' ? 'en-US' : 'ar-AR'],
            ['locale', 'in', 'range' => array_keys(Yii::$app->params['availableLocales'])],
            [['picture', 'city_id', 'interested_in_university', 'interested_in_schools', 'students_nationalities', 'communtication_channel','profile_percentage','country_code'], 'safe'],
            [['mobile', 'telephone_no'], 'number'],
            [['find_us_from', 'no_of_students', 'expected_no_of_students'], 'integer'],
            [['job_title', 'company_name'], 'string'],
            ['country_code','string']

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('common', 'User ID'),
            'firstname' => Yii::t('common', 'Firstname'),
            'middlename' => Yii::t('common', 'Middlename'),
            'lastname' => Yii::t('common', 'Lastname'),
            'locale' => Yii::t('common', 'Locale'),
            'picture' => Yii::t('common', 'Picture'),
            'gender' => Yii::t('common', 'Gender'),
            'nationality' => Yii::t('common', 'Nationality'),
            'communtication_channel' => Yii::t('common', 'Best way to commuincation?'),
            'find_us_from' => Yii::t('common', 'How did you found us?'),
            'expected_no_of_students' => Yii::t('common', 'Expected number of students to refer to Eduxa'),
            'city_id' => Yii::t('common', 'City'),
            'state_id' => Yii::t('common', 'State'),
            'country_id' => Yii::t('common', 'Country'),
            'mobile' => Yii::t('common', 'Mobile Number'),
            'telephone_no' => Yii::t('common', 'Telephone Number'),
            'job_title' => Yii::t('common', 'Job Title'),
            'company_name' => Yii::t('common', 'Company Name'),
            'no_of_students' => Yii::t('common', 'No. Of Previous Referrals'),
            'interested_in_university' => Yii::t('common', 'University Education'),
            'interested_in_schools' => Yii::t('common', 'Language School'),
            'students_nationalities' => Yii::t('common', 'Nationality Of Referral'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
    public function getProfileNationality()
    {
        return $this->hasOne(Country::class, ['id' => 'nationality']);
    }

    public function getCountry()
    {
        return $this->hasOne(Country::class, ['id' => 'country_id']);
    }

    public function getState()
    {
        return $this->hasOne(State::class, ['id' => 'state_id']);
    }

    public function getCity()
    {
        return $this->hasOne(Cities::class, ['id' => 'city_id']);
    }

    public function getInterestedUniversity()
    {
        return $this->hasOne(University::class, ['id' => 'interested_in_university']);
    }

    public function getInterestedSchool()
    {
        return $this->hasOne(Schools::class, ['id' => 'interested_in_schools']);
    }

    public function getRequests()
    {
        return $this->hasMany(\backend\models\Requests::className(), ['requester_id' => 'user_id']);
    }

    public function getAvailableRequests()
    {
        return $this->hasMany(\backend\models\Requests::className(), ['requester_id' => 'user_id'])->andwhere(['!=','status',\backend\models\Requests::STATUS_CANCELED]);
    }
    /**
     * @return null|string
     */
    public function getFullName()
    {
        if ($this->firstname || $this->lastname) {
            return implode(' ', [$this->firstname, $this->lastname]);
        }
        return null;
    }

    /**
     * @param null $default
     * @return bool|null|string
     */
    public function getAvatar($default = '/img/avatars/default-avatar.png')
    {
        return $this->avatar_path
        ? Yii::getAlias($this->avatar_base_url . '/' . $this->avatar_path)
        : $default;
    }
}
