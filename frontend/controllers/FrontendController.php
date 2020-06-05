<?php


namespace frontend\controllers;
use common\helpers\MyCurrencySwitcher;
use webvimark\behaviors\multilanguage\MultiLanguageHelper;
use yii\web\Controller;

/**
 * Site controller
 */
class FrontendController extends Controller
{


    public function init()
    {
        MultiLanguageHelper::catchLanguage();
        MyCurrencySwitcher::catchCurrency();
        parent::init();
    }

    public function AllTags($title=null,$url=null,$description=null,$image=null,$alt=null){

        if(!$title)        $title       = 'Eduxa';
        if(!$url)          $url         = '';
        if(!$image)        $image       = "";
        if(!$alt)          $alt         = "";

        if($description){
            $description= strip_tags($description) ;
            //meta Tags
            \Yii::$app->view->registerMetaTag([
                'name' => 'description',
                'content' => $description
            ]);
            \Yii::$app->view->registerMetaTag([
                'property' => 'og:description',
                'content' =>$description
            ]);
        }




        \Yii::$app->view->registerMetaTag([
            'property' => 'fb:app_id',
            'content' => env('FACEBOOK_CLIENT_ID')
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:url',
            'content' => $url
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:title',
            'content' => $title
        ]);

        \Yii::$app->view->registerMetaTag([
            'property' => 'og:image',
            'content' => $image,
            'alt' => $title
        ]);
        \Yii::$app->view->registerLinkTag([
            'rel' => 'canonical',
            'href' => $url
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:type',
            'content' => "website"
        ]);


    }


}

?>