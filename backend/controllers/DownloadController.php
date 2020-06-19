<?php

namespace backend\controllers;
use Yii;
/**
 * FaqController implements the CRUD actions for Faq model.
 */
class DownloadController  extends BackendController
{

    public function actionIndex($file){


        if (file_exists($file)) {
            Yii::$app->response->sendFile( file_get_contents($file));

        }


//        header('Content-Type: application/octet-stream');
//        header("Content-Transfer-Encoding: Binary");
//        header("Content-disposition: attachment; filename=\"" . basename($file) . "\"");
//        readfile($file);
//        return ;
    }
}