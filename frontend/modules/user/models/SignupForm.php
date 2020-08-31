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

/**
 * Signup form
 */
class SignupForm extends Model
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
    public $gender;
    public $country_id;
    public $state_id;
    public $city_id;
    public $mobile;
    public $nationality;
    public $find_us_from;
    public $communtication_channel;
    public $interested_in_schools;
    public $interested_in_university;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            ['username', 'filter', 'filter' => 'trim'],
           // ['username', 'required'],
//            ['username', 'unique',
//                'targetClass' => '\common\models\User',
//                'message' => Yii::t('frontend', 'This username has already been taken.')
//            ],
//            ['username', 'string', 'min' => 2, 'max' => 255],

            [['firstname','lastname','gender','email','mobile','nationality','find_us_from','communtication_channel','password','password_confirm',
                'country_id','city_id','state_id'
                ], 'required'],
            ['nationality','string', 'min' => 2, 'max' => 60],
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
                    return $('#signupform-password').val().length > 0;
                }")
            ],
            ['password_confirm', 'compare', 'compareAttribute' => 'password', 'skipOnEmpty' => false ,
                'message'=>\Yii::t('common','Your password doesn’t match the above text')],


            ['mobile','number'],
            [['interested_in_university','interested_in_schools'],'integer'],
            [
                'interested_in_university',
                'checkChoseInterested',
            ],
        ];
    }

    public function checkChoseInterested(){
        if($this->interested_in_university == 0 and $this->interested_in_schools == 0){
            $this->addError('interested_in_schools',\Yii::t('common','at least you should select University Education
            or Language School'));
        }
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
            'gender' => Yii::t('common', 'Gender'),
            'nationality' => Yii::t('common', 'Nationality'),
            'communtication_channel' => Yii::t('common', 'Best way to commuincation?'),
            'find_us_from' => Yii::t('common', 'How did you found us?'),
            'expected_no_of_students' => Yii::t('common', 'Expected No. Of Referrals To Apply For By Eduxa'),
            'city_id' => Yii::t('common', 'City'),
            'country_id' => Yii::t('common', 'Country'),
            'state_id' => Yii::t('common', 'State'),
            'mobile' => Yii::t('common', 'Mobile Number'),
            'interested_in_university' => Yii::t('common', 'University Education'),
            'interested_in_schools' => Yii::t('common', 'Language School'),

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
            $user->status = $shouldBeActivated ? User::STATUS_EMAIL_NOT_ACTIVE : User::STATUS_ACTIVE;
            $user->setPassword($this->password);
            if (!$user->save()) {
                var_dump($user->errors);die;
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
                    // 'to' => 'm.3laa.95@gmail.com',
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
