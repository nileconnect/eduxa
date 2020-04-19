<?php


namespace frontend\controllers;
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
        parent::init();
    }

}

?>