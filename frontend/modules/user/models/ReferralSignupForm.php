<?php

namespace frontend\modules\user\models;

use cheatsheet\Time;
use common\commands\SendEmailCommand;
use common\models\User;
use common\models\UserToken;
use frontend\modules\user\Module;
use Yii;
use yii\base\Exception;
use yii\base\Model;
use yii\helpers\Url;
use yii\web\JsExpression;

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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [ ['firstname' ,'lastname'], 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            [['firstname','lastname','email','mobile','find_us_from','no_of_students','expected_no_of_students','students_nationalities'], 'required'],
            ['email', 'email'],
            ['email', 'unique',
                'targetClass' => '\common\models\User',
                'message' => Yii::t('frontend', 'This email address has already been taken.')
            ],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

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
            [['no_of_students','expected_no_of_students'],'integer'],

            ['mobile','number'],
            [['students_nationalities'],'string','max'=>255]
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
            'firstname' => Yii::t('common', 'First name'),
            'lastname' => Yii::t('common', 'Last name'),
            'find_us_from' => Yii::t('common', 'How did you found us?'),
            'city_id' => Yii::t('common', 'City'),
            'country_id' => Yii::t('common', 'Country'),
            'state_id' => Yii::t('common', 'State'),
            'mobile' => Yii::t('common', 'Mobile Number'),
            'expected_no_of_students' => Yii::t('common', 'Expected No. Of Referrals To Apply For By Eduxa'),
            'no_of_students' => Yii::t('common', 'No. Of Previous Referrals'),
            'students_nationalities' => Yii::t('common', 'Nationality Of Referrals'),




        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     * @throws Exception
     */
    public function signup()
    {
        if ($this->validate()) {
            $shouldBeActivated = $this->shouldBeActivated();
            $user = new User();
            $user->email = $user->username = $this->email;
            $user->status = $shouldBeActivated ? User::STATUS_NOT_ACTIVE : User::STATUS_ACTIVE;
            $user->setPassword($this->password);
            if (!$user->save()) {
                throw new Exception("User couldn't be  saved");
            };
            $profileData['firstname']=$this->firstname;
            $profileData['lastname']=$this->lastname;
            $profileData['gender']=$this->gender;
            $profileData['country_id']=$this->country_id;
            $profileData['state_id']=$this->state_id;
            $profileData['city_id']=$this->city_id;
            $profileData['nationality']=$this->nationality;
            $profileData['find_us_from']=$this->find_us_from;
            $profileData['communtication_channel']=$this->communtication_channel;
            $profileData['interested_in_university']=$this->interested_in_university;
            $profileData['interested_in_schools']=$this->interested_in_schools;
            $profileData['mobile']=$this->mobile;


            $user->afterSignup($profileData);
            if ($shouldBeActivated) {
                $token = UserToken::create(
                    $user->id,
                    UserToken::TYPE_ACTIVATION,
                    Time::SECONDS_IN_A_DAY
                );
                Yii::$app->commandBus->handle(new SendEmailCommand([
                    'subject' => Yii::t('frontend', 'Activation email'),
                    'view' => 'activation',
                    'to' => $this->email,
                    'params' => [
                        'url' => Url::to(['/user/sign-in/activation', 'token' => $token->token], true)
                    ]
                ]));
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
