<?php

namespace frontend\controllers;

use Yii;
use cheatsheet\Time;
use yii\helpers\Url;
use yii\web\Cookie;
use yii\web\Response;
use Sitemaped\Sitemap;
use yii\web\Controller;
use yii\filters\PageCache;
use backend\models\Newsletter;
use common\sitemap\UrlsIterator;
use frontend\models\ContactForm;
use Sitemaped\Element\Urlset\Urlset;
use yii\web\BadRequestHttpException;
use common\commands\SendEmailCommand;
use common\helpers\MyCurrencySwitcher;
use imanilchaudhari\CurrencyConverter\CurrencyConverter;

/**
 * Site controller
 */
class SiteController extends FrontendController
{
    /**
     * @return array
     */
//    public function behaviors()
//    {
//        return [
//            [
//                'class' => PageCache::class,
//                'only' => ['sitemap'],
//                'duration' => Time::SECONDS_IN_AN_HOUR,
//            ]
//        ];
//    }




    public function actionCalc()
    {
        //test emails
        Yii::$app->commandBus->handle(new SendEmailCommand([
            'subject' => Yii::t('frontend', 'Activation email'),
            'view' => 'activation',
            'to' => "mohamed.amer2050@gmail.com",
            'params' => [
                'url' => Url::to(['/user/sign-in/activation', 'token' => 'dmeuhfue fu ehfi'], true)
            ]
        ]));

        die;
       echo  MyCurrencySwitcher::Convert('EUR','USD',1);
       die;

    }


    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null
            ],
//            'set-locale' => [
//                'class' => 'common\actions\SetLocaleAction',
//                'locales' => array_keys(Yii::$app->params['availableLocales'])
//            ]
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {

        $seotitle=$title= 'Eduxa';
        $this->AllTags($seotitle);
        \Yii::$app->view->title= $title;

        $this->layout = 'landingLayout';

        Yii::$app->getSession()->setFlash('alert-create-account-successfully', [
            'body' => Yii::t(
                'frontend',
                'Your account has been successfully created. Check your email for further instructions.'
            ),
        ]);
        return $this->render('index');
    }

    /**
     * @return string|Response
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->contact(Yii::$app->params['adminEmail'])) {
                Yii::$app->getSession()->setFlash('alert', [
                    'body' => Yii::t('frontend', 'Thank you for contacting us. We will respond to you as soon as possible.'),
                    'options' => ['class' => 'alert-success']
                ]);
                return $this->refresh();
            }

            Yii::$app->getSession()->setFlash('alert', [
                'body' => \Yii::t('frontend', 'There was an error sending email.'),
                'options' => ['class' => 'alert-danger']
            ]);
        }

        return $this->render('contact', [
            'model' => $model
        ]);
    }

    public function actionTest(){
        Yii::$app->commandBus->handle(new SendEmailCommand([
            'subject' => Yii::t('frontend', 'Activation email'),
            'view' => 'activation',
            'from'=>'3pic.devteam@gmail.com',
            'to' => 'mohamed.amer2050@gmail.com',
            'params' => [
                'url' => Url::to(['/user/sign-in/activation', 'token' => 'dddedefefefe'], true)
            ]
        ]));
    }


    /**
     * @param string $format
     * @param bool $gzip
     * @return string
     * @throws BadRequestHttpException
     */
    public function actionSitemap($format = Sitemap::FORMAT_XML, $gzip = false)
    {
        $links = new UrlsIterator();
        $sitemap = new Sitemap(new Urlset($links));

        Yii::$app->response->format = Response::FORMAT_RAW;

        if ($gzip === true) {
            Yii::$app->response->headers->add('Content-Encoding', 'gzip');
        }

        if ($format === Sitemap::FORMAT_XML) {
            Yii::$app->response->headers->add('Content-Type', 'application/xml');
            $content = $sitemap->toXmlString($gzip);
        } else if ($format === Sitemap::FORMAT_TXT) {
            Yii::$app->response->headers->add('Content-Type', 'text/plain');
            $content = $sitemap->toTxtString($gzip);
        } else {
            throw new BadRequestHttpException('Unknown format');
        }

        $linksCount = $sitemap->getCount();
        if ($linksCount > 50000) {
            Yii::warning(\sprintf('Sitemap links count is %d'), $linksCount);
        }

        return $content;
    }

    public function actionNewsletter()
    {
        $model = new Newsletter();

        if($model->load(Yii::$app->request->post()) and $model->save()){
            Yii::$app->getSession()->setFlash('alert', [
                'body' => Yii::t('frontend', 'Thank you for subscription.'),
                'options' => ['class' => 'alert-success']
            ]);
        }
        return $this->redirect(Yii::$app->request->referrer);
    }
}
