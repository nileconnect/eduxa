<?php

namespace frontend\modules\user\controllers;

use cheatsheet\Time;
use common\commands\SendEmailCommand;
use common\models\User;
use common\models\UserToken;
use frontend\modules\user\models\LoginForm;
use frontend\modules\user\models\PasswordResetRequestForm;
use frontend\modules\user\models\ReferralSignupForm;
use frontend\modules\user\models\ResetPasswordForm;
use frontend\modules\user\models\SignupForm;
use webvimark\behaviors\multilanguage\MultiLanguageHelper;
use Yii;
use yii\authclient\AuthAction;
use yii\base\Exception;
use yii\base\InvalidArgumentException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * Class SignInController
 * @package frontend\modules\user\controllers
 */
class SignInController extends \yii\web\Controller
{

    public function init()
    {
        MultiLanguageHelper::catchLanguage();
        parent::init();
    }

    /**
     * @return array
     */
    public function actions()
    {
        return [
            'oauth' => [
                'class' => AuthAction::class,
                'successCallback' => [$this, 'successOAuthCallback']
            ]
        ];
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => [
                            'success','signup','referral-signup','referral-company', 'login', 'login-by-pass', 'request-password-reset', 'reset-password', 'oauth', 'activation'
                        ],
                        'allow' => true,
                        'roles' => ['?']
                    ],
                    [
                        'actions' => [
                            'signup', 'login', 'request-password-reset', 'reset-password', 'oauth', 'activation'
                        ],
                        'allow' => false,
                        'roles' => ['@'],
                        'denyCallback' => function () {
                            return Yii::$app->controller->redirect(['/user/default/index']);
                        }
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                   // 'logout' => ['post']
                ]
            ]
        ];
    }

    /**
     * @return array|string|Response
     */
    public function actionLogin($resend=null)
    {
        if($resend){
            // resend email
           $user=  User::find()
                ->where(['or', ['username' => $resend], ['email' => $resend]])
                ->one();
           if($user){
               $no_of_tokens = UserToken::find()->where(['user_id'=>$user->id , 'type'=>UserToken::TYPE_ACTIVATION])->count();
               if($no_of_tokens < 5){
                   $token = UserToken::create(
                       $user->id,
                       UserToken::TYPE_ACTIVATION,
                       Time::SECONDS_IN_A_DAY
                   );
                   Yii::$app->commandBus->handle(new SendEmailCommand([
                       'subject' => Yii::t('frontend', 'Activation email'),
                       'view' => 'activation',
                       'to' => $user->email,
                       'params' => [
                           'url' => Url::to(['/user/sign-in/activation', 'token' => $token->token], true)
                       ]
                   ]));
               }

               Yii::$app->getSession()->setFlash('alert', [
                   'type' =>'success',
                   'body' => \Yii::t('frontend', 'Please check your email to verify your account') ,
                   'title' =>'',
               ]);
           }

            return $this->redirect('login');
        }

        $model = new LoginForm();
        if (Yii::$app->request->isAjax) {
            $model->load($_POST);
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if(isset($_GET['return'])){
                return $this->redirect($_GET['return']);
            }
            return $this->goBack();
        }

        return $this->render('login', [
            'model' => $model
        ]);
    }

    /**
     * @param $token
     * @return array|string|Response
     * @throws ForbiddenHttpException
     * @throws \Exception
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionLoginByPass($token)
    {
        if (!$this->module->enableLoginByPass) {
            throw new NotFoundHttpException();
        }

        $user = UserToken::use($token, UserToken::TYPE_LOGIN_PASS);

        if ($user === null) {
            throw new ForbiddenHttpException();
        }

        Yii::$app->user->login($user);
        return $this->goHome();
    }

    /**
     * @return Response
     */
    public function actionLogout()
    {
        $lang= Yii::$app->language;
        Yii::$app->user->logout();

        return  $this->redirect('/site/index?_language='.$lang);
       // return $this->goHome();
    }

    /**
     * @return string|Response
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            $user = $model->signup();
            if ($user) {
                if ($model->shouldBeActivated()) {
                    Yii::$app->getSession()->setFlash('alert-create-user-account-successfully', [
                        'body' => Yii::t(
                            'frontend',
                            'Your account has been successfully created. Check your email for further instructions.'
                        ),
                    ]);

                    Yii::$app->getSession()->setFlash('alert', [
                        'type' =>'success',
                        'body' => \Yii::t('frontend', 'Your account has been successfully created. Check your email for further instructions.') ,
                        'title' =>'',
                    ]);

                } else {
                    Yii::$app->getUser()->login($user);
                }
                return $this->redirect('/login');
            }
        }

        return $this->render('signup', [
            'model' => $model
        ]);
    }


    /**
     * @return string|Response
     */
    public function actionReferralSignup()
    {
        $model = new ReferralSignupForm();

        if ($model->load(Yii::$app->request->post())) {
            $user = $model->signup();
            if ($user) {
                if ($model->shouldBeActivated()) {
                    Yii::$app->getSession()->setFlash('alert-create-account-referral-successfully', [
                        'body' => Yii::t(
                            'frontend',
                            'your account will be verified by our team'
                        ),
                    ]);

                    Yii::$app->getSession()->setFlash('alert', [
                        'type' =>'success',
                        'body' => \Yii::t('frontend', 'your account will be verified by our team') ,
                        'title' =>'',
                    ]);

                } else {
                    Yii::$app->getUser()->login($user);
                }
                return $this->redirect('/success');
            }
        }
        return $this->render('referral-signup', [
            'model' => $model,
            'modelCompany'=>$modelCompany
        ]);
    }

    public function actionReferralCompany()
    {
        $modelCompany = new ReferralSignupForm();
        $modelCompany->scenario ='RefCompany';

        if ($modelCompany->load(Yii::$app->request->post())) {
            $user = $modelCompany->signup(User::ROLE_REFERRAL_COMPANY);
            if ($user) {
                if ($modelCompany->shouldBeActivated()) {
                    Yii::$app->getSession()->setFlash('alert-create-account-referral-successfully', [
                        'body' => Yii::t(
                            'frontend',
                            'your account will be verified by our team'
                        ),
                    ]);

                    Yii::$app->getSession()->setFlash('alert', [
                        'type' =>'warning',
                        'body' => \Yii::t('frontend', 'your account will be verified by our team') ,
                        'title' =>'',
                    ]);

                } else {
                    Yii::$app->getUser()->login($user);
                }
                return $this->redirect('/success');
            }
        }
        return $this->render('referral-company', [
            'modelCompany'=>$modelCompany
        ]);
    }

    public function actionSuccess(){
        return $this->render('success');
    }

    /**
     * @param $token
     * @return Response
     * @throws BadRequestHttpException
     */
    public function actionActivation($token)
    {
        $token = UserToken::find()
            ->byType(UserToken::TYPE_ACTIVATION)
            ->byToken($token)
            ->notExpired()
            ->one();

        if (!$token) {
            throw new BadRequestHttpException;
        }

        $user = $token->user;
        $user->updateAttributes([
            'status' => User::STATUS_ACTIVE
        ]);
        $token->delete();
        Yii::$app->getUser()->login($user);
        Yii::$app->getSession()->setFlash('alert', [
            'body' => Yii::t('frontend', 'Your account has been successfully activated.'),
            'options' => ['class' => 'alert-success']
        ]);

        return $this->goHome();
    }

    /**
     * @return string|Response
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('alert', [
                    'body' => Yii::t('frontend', 'Check your email for further instructions.'),
                    'options' => ['class' => 'alert-success']
                ]);

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('alert', [
                    'body' => Yii::t('frontend', 'Sorry, we are unable to reset password for email provided.'),
                    'options' => ['class' => 'alert-danger']
                ]);
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * @param $token
     * @return string|Response
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('alert', [
                'body' => Yii::t('frontend', 'New password was saved.'),
                'options' => ['class' => 'alert-success']
            ]);
            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * @param $client \yii\authclient\BaseClient
     * @return bool
     * @throws Exception
     */
    public function successOAuthCallback($client)
    {
        // use BaseClient::normalizeUserAttributeMap to provide consistency for user attribute`s names
        $attributes = $client->getUserAttributes();
        $user = User::find()->where([
            'oauth_client' => $client->getName(),
            'oauth_client_user_id' => ArrayHelper::getValue($attributes, 'id')
        ])->one();
        if (!$user) {
            $user = new User();
            $user->scenario = 'oauth_create';
            $user->username = ArrayHelper::getValue($attributes, 'login');
            // check default location of email, if not found as in google plus dig inside the array of emails
            $email = ArrayHelper::getValue($attributes, 'email');
            if($email === null){
                $email = ArrayHelper::getValue($attributes, ['emails', 0, 'value']);
            }
            $user->email = $email;
            $user->oauth_client = $client->getName();
            $user->oauth_client_user_id = ArrayHelper::getValue($attributes, 'id');
            $user->status = User::STATUS_ACTIVE;
            $password = Yii::$app->security->generateRandomString(8);
            $user->setPassword($password);
            if ($user->save()) {
                $profileData = [];
                if ($client->getName() === 'facebook') {
                    $profileData['firstname'] = ArrayHelper::getValue($attributes, 'first_name');
                    $profileData['lastname'] = ArrayHelper::getValue($attributes, 'last_name');
                }
                $user->afterSignup($profileData);
                $sentSuccess = Yii::$app->commandBus->handle(new SendEmailCommand([
                    'view' => 'oauth_welcome',
                    'params' => ['user' => $user, 'password' => $password],
                    'subject' => Yii::t('frontend', '{app-name} | Your login information', ['app-name' => Yii::$app->name]),
                    'to' => $user->email
                ]));
                if ($sentSuccess) {
                    Yii::$app->session->setFlash(
                        'alert',
                        [
                            'options' => ['class' => 'alert-success'],
                            'body' => Yii::t('frontend', 'Welcome to {app-name}. Email with your login information was sent to your email.', [
                                'app-name' => Yii::$app->name
                            ])
                        ]
                    );
                }

            } else {
                // We already have a user with this email. Do what you want in such case
                if ($user->email && User::find()->where(['email' => $user->email])->count()) {
                    Yii::$app->session->setFlash(
                        'alert',
                        [
                            'options' => ['class' => 'alert-danger'],
                            'body' => Yii::t('frontend', 'We already have a user with email {email}', [
                                'email' => $user->email
                            ])
                        ]
                    );
                } else {
                    Yii::$app->session->setFlash(
                        'alert',
                        [
                            'options' => ['class' => 'alert-danger'],
                            'body' => Yii::t('frontend', 'Error while oauth process.')
                        ]
                    );
                }

            };
        }
        if (Yii::$app->user->login($user, 3600 * 24 * 30)) {
            return true;
        }

        throw new Exception('OAuth error');
    }
}
