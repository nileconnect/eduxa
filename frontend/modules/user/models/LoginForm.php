<?php

namespace frontend\modules\user\models;

use cheatsheet\Time;
use common\models\User;
use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $identity;
    public $password;
    public $rememberMe = true;

    private $user = false;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['identity', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'identity' => Yii::t('frontend', 'Username or email'),
            'password' => Yii::t('frontend', 'Password'),
            'rememberMe' => Yii::t('frontend', 'Remember Me'),
        ];
    }


    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     */
    public function validatePassword()
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $checkUser = User::find()->andWhere(['or', ['username' => $this->identity], ['email' => $this->identity]])
                    ->one();
                $checkUserVerifiyEmail = User::find()
                    ->where(['status'=>User::STATUS_EMAIL_NOT_ACTIVE])->andWhere(['or', ['username' => $this->identity], ['email' => $this->identity]])
                    ->one();
                $checkUserNotActive = User::find()
                    ->where(['status'=>User::STATUS_NOT_ACTIVE])->andWhere(['or', ['username' => $this->identity], ['email' => $this->identity]])
                    ->one();
                if(!$checkUser){
                    $this->addError('password', Yii::t('frontend', 'Incorrect username or password.'));
                    return  false;
                }

                if($checkUserVerifiyEmail){
                    $this->addError('password', Yii::t('frontend', 'You Should Verify Email First.'.'<a href="/login?resend='. $this->identity.'">'.Yii::t('fronend','Resend verification Email').'</a>'));
                    return  false;
                }
                if($checkUserNotActive){
                    $this->addError('password', Yii::t('frontend', 'Account not verified.'));
                    return  false;
                }

               // return  false;
                $this->addError('password', Yii::t('frontend', 'Your Email or password are not valid'));
            }
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->user === false) {   
            $this->user = User::find()
                ->active()
                ->andWhere(['or', ['username' => $this->identity], ['email' => $this->identity]])
                ->one();
        }

        return $this->user;
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            if (Yii::$app->user->login($this->getUser(), $this->rememberMe ? Time::SECONDS_IN_A_MONTH : 0)) {
                return true;
            }
        }
        return false;
    }
}
