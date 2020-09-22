<?php

namespace frontend\modules\user\models;

use Yii;
use yii\base\Model;
use cheatsheet\Time;
use yii\helpers\Url;
use common\models\User;
use yii\base\Exception;
use yii\web\JsExpression;
use common\models\UserToken;
use frontend\modules\user\Module;
use common\commands\SendEmailCommand;
use kartik\password\StrengthValidator;
use borales\extensions\phoneInput\PhoneInputValidator;
use borales\extensions\phoneInput\PhoneInputBehavior;

/**
 * Signup form
 */
class ReferralSignupForm extends Model
{
    /**
     * @var
     */
    public $username;
    /**
     * @var
     */
    public $email;
    /**
     * @var
     */
    public $password;
    public $password_confirm;

    public $firstname;
    public $lastname;
    public $country_id;
    public $state_id;
    public $city_id;
    public $mobile;
    public $find_us_from;
    public $communtication_channel;
    public $no_of_students;
    public $students_nationalities;
    public $expected_no_of_students;
    public $job_title;
    public $telephone_no;
    public $company_name;
    public $nationality;
    public $country_code;
    public $phone;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname','lastname','email','mobile','password','password_confirm',
                'country_id','city_id','state_id','no_of_students','expected_no_of_students','students_nationalities','find_us_from'
            ], 'required'],
            [ ['firstname' ,'lastname'], 'string', 'min' => 2, 'max' => 15],
            //[['firstname' ,'lastname','nationality'], 'match', 'pattern' => "/^[\u0600-\u065F\u066A-\u06EF\u06FA-\u06FFa-zA-Z_ ]+[\u0600-\u065F\u066A-\u06EF\u06FA-\u06FFa-zA-Z-_ ]*$/i"],
            [['email','firstname' ,'lastname','nationality'], 'filter', 'filter' => 'trim'],
            ['email', 'email'],
            ['email', 'unique',
                'targetClass' => '\common\models\User',
                'message' => Yii::t('frontend', 'This email address has already been taken.')
            ],

            [['password'], StrengthValidator::className(), 'preset'=>'normal',
                'minError'=> \Yii::t('backend','password should contain at least 8 characters'),
                'lowerError'=> \Yii::t('backend','password should contain at least one lower case character'),
                'upperError'=> \Yii::t('backend','password should contain at least one uppercase character'),
                'digitError'=> \Yii::t('backend','password should contain at least one numeric  character'),
            ],
            [['password_confirm'], 'string', 'min' => 8 , 'max'=>15],

            [
                'password_confirm',
                'required',
                'when' => function ($model) {
                    return !empty($model->password);
                },
                'whenClient' => new JsExpression("function (attribute, value) {
                    return $('#referralsignupform-password').val().length > 0;
                }")
            ],
            ['password_confirm', 'compare', 'compareAttribute' => 'password', 'skipOnEmpty' => false],
            [['expected_no_of_students','country_id','state_id','city_id'],'integer'],

            [['no_of_students','telephone_no'],'number'],
            [['students_nationalities'],'string','max'=>255],
            [['job_title','company_name','students_nationalities'],'string','max'=>30,'min'=>2],
            [['job_title','company_name','telephone_no'],'required' ,'on'=>'RefCompany'],

            [['mobile'], 'string'],
            [['mobile'], PhoneInputValidator::className()],



        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => PhoneInputBehavior::className(),
                'countryCodeAttribute' => 'country_code',
            ],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('frontend', 'Username'),
            'email' => Yii::t('frontend', 'E-mail'),
            'password' => Yii::t('frontend', 'Password'),
            'password_confirm' => Yii::t('frontend', 'Confirm Password'),
            'firstname' => Yii::t('common', 'First Name(s)'),
            'lastname' => Yii::t('common', 'Family Name'),
            'find_us_from' => Yii::t('common', 'How did you know about Eduxa?'),
            'city_id' => Yii::t('common', 'City'),
            'country_id' => Yii::t('common', 'Country'),
            'state_id' => Yii::t('common', 'State'),
            'mobile' => Yii::t('common', 'Mobile Number'),
            'expected_no_of_students' => Yii::t('common', 'Expected number of students to refer to Eduxa'),
            'no_of_students' => Yii::t('common', 'Number of students served before'),
            'students_nationalities' => Yii::t('common', 'Nationality of served students'),
            'telephone_no' => Yii::t('common', 'Telephone Number'),
            'job_title' => Yii::t('common', 'Job Title'),
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     * @throws Exception
     */
    public function signup($role= User::ROLE_REFERRAL_PERSON)
    {
        if ($this->validate()) {
            $shouldBeActivated = $this->shouldBeActivated();
            $user = new User();
            $user->email = $user->username = $this->email;
            $user->status = User::STATUS_NOT_ACTIVE;
            $user->setPassword($this->password);
            if (!$user->save()) {
                throw new Exception("User couldn't be  saved");
            };
            $profileData['firstname']=$this->firstname;
            $profileData['lastname']=$this->lastname;
            $profileData['mobile']=$this->mobile;
            $profileData['country_code']=$this->country_code;

            $profileData['country_id']=$this->country_id;
            $profileData['state_id']=$this->state_id;
            $profileData['city_id']=$this->city_id;

            $profileData['no_of_students']=$this->no_of_students;
            $profileData['students_nationalities']=$this->students_nationalities;
            $profileData['find_us_from']=$this->find_us_from;
            $profileData['students_nationalities']=$this->students_nationalities;
            $profileData['expected_no_of_students']=$this->expected_no_of_students;

            $profileData['telephone_no']=$this->telephone_no;
            $profileData['job_title']=$this->job_title;
            $profileData['company_name']=$this->company_name;

            $user->afterSignup($profileData,$role);
            if ($shouldBeActivated) {
                $token = UserToken::create(
                    $user->id,
                    UserToken::TYPE_ACTIVATION,
                    Time::SECONDS_IN_A_DAY
                );
//                Yii::$app->commandBus->handle(new SendEmailCommand([
//                    'subject' => Yii::t('frontend', 'Account Created Successfully.'),
//                    'view' => 'createAccountWithNeedApproval',
//                    'to' => $this->email,
//                    'params' => [
//                        'name' => $this->firstname,
//                    ],
//                ]));
//                Yii::$app->commandBus->handle(new SendEmailCommand([
//                    'subject' => Yii::t('frontend', 'Account Created Successfully.'),
//                    'view' => 'newUserCreated',
//                    'to' => \Yii::$app->params['adminEmail'],
//                    'params' => [
//                        'name' => $this->firstname,
//                    ],
//                ]));
            }
            return $user;
        }

        return null;
    }

    /**
     * @return bool
     */
    public function shouldBeActivated()
    {
        /** @var Module $userModule */
        $userModule = Yii::$app->getModule('user');
        if (!$userModule) {
            return false;
        } elseif ($userModule->shouldBeActivated) {
            return true;
        } else {
            return false;
        }
    }
}
