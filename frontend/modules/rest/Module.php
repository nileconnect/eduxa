<?php

namespace frontend\modules\rest;

use Yii;
use yii\filters\ContentNegotiator;
use yii\filters\RateLimiter;
use yii\web\Response;

class Module extends \yii\base\Module
{
    /** @var string */
    public $controllerNamespace = 'frontend\modules\rest\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        Yii::$app->user->identityClass = 'frontend\modules\rest\models\ApiUserIdentity';
        Yii::$app->user->enableSession = false;
        Yii::$app->user->loginUrl = null;

        // you can daclare handler as function in you module and pass it as parameter here
        \Yii::$app->response->on(Response::EVENT_BEFORE_SEND,

            function ($event) {
                $response = $event->sender;
                if ($response->data !== null && Yii::$app->request->get('suppress_response_code')) {
                    $response->data = [
                        'success' => $response->isSuccessful,
                        'data' => $response->data,
                    ];
                    $response->statusCode = 200;
                }
            }


        );
    }




    /**
     * @return array
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['contentNegotiator'] = [
            'class' => ContentNegotiator::class,
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
                'application/xml' => Response::FORMAT_XML,
            ],
        ];

        $behaviors['rateLimiter'] = [
            'class' => RateLimiter::class,
        ];

        return $behaviors;
    }
}
