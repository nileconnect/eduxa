<?php

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UniversitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = Yii::t('backend', 'Universities');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);


echo newerton\fancybox3\FancyBox::widget([

    'config'=>[
        'iframe' => [
            'preload'       => true,
            'css'=>[
                'width'=>'800px',
                'height'=>'500px'
            ]
        ],

    ],
]);


?>


<style>
    .tileMe li {
        display: inline;
        float: left;
        padding: 3px;
    }

</style>
<div class="university-index">

    <?php
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        'title',
        [
            'attribute'=>'unversity_logo',
            'value'=>function($model){
                return '<a class="uploadBtn" data-fancybox="" data-type="iframe"   data-options=\'{"type" : "iframe", "iframe" : {"preload" : false, "css" : {"width" : "400px" , "height" : "400px" }}}\'  href="/university/update-logo?id='.$model->id.'">
                <i class="fa fa-cloud-upload" aria-hidden="true"></i><span>Upload Image</span></a><br/>
           <a href="'.$model->logoImage.'" data-fancybox  data-caption="'.$model->title .' - Logo"> <img src="'.$model->logoImage.'" width="90px" height="90px" /></a><br/>' ;
            },
            'format'=>'raw',

            'filter' => Html::activeDropDownList($searchModel, 'unversity_logo', [ 1 =>'Has Logo' , 2=>'Has No Logo'],['class'=>'form-control',
                'prompt' =>  Yii::t('backend','Select .. ') ]),
        ],

        [
            'label'=>'Pictures',
            'attribute'=>'imagesCount',
            'value'=>function($model){
                $str='<p><a class="uploadBtn" data-fancybox="" data-type="iframe"  data-options=\'{"type" : "iframe", "iframe" : {"preload" : false, "css" : {"width" : "800px" , "height" : "500px" }}}\'  href="/university/update-pictures?id='.$model->id.'"><i class="fa fa-cloud-upload" aria-hidden="true"></i><span>Upload Image</span></a></p>';
                        if($model->universityPhotos){
                            $str.= '
                                <ul class="tileMe">';
                            foreach ($model->universityPhotos as $universityPhoto) {
                                $str.= '<li>
                                        <a href="'.$universityPhoto->base_url.$universityPhoto->path.'" data-fancybox="images" data-caption="'.$model->title .' - Media">
                                                    <img src="'.$universityPhoto->base_url.$universityPhoto->path.' " alt=""  width="90px" height="90px" />
                                        </a>
                                      </li>';
                            }
                            $str.= '</ul>';
                        }
                return  $str .'<br/>' ;
            },
            'format'=>'raw',
            'contentOptions'=>[ 'style'=>'width: 400px']
        ],


        [
            'label'=>'Videos',
            'attribute'=>'videosCount',
            'value'=>function($model){
                $str='<a class="uploadBtn" data-fancybox="" data-type="iframe" data-options=\'{"type" : "iframe", "iframe" : {"preload" : false, "css" : {"width" : "800px" , "height" : "600px" }}}\'  href="/university/update-videos?id='.$model->id.'"><i class="fa fa-cloud-upload" aria-hidden="true"></i><span>Upload Image</span></a>';
                if($model->universityVideos){
                    $str.= ' <ul>';
                    foreach ($model->universityVideos as $universityVideo) {
                        $str.= '<li>'. $universityVideo->base_url .'</li>';
                    }
                    $str.= '</ul>';
                }
                return  $str.'<br/>
                    ' ;
            },
            'format'=>'raw'
        ],



//        [
//            'class' => 'yii\grid\ActionColumn','template'=>'{view} {update}'
//        ],
    ];
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'export'=>false,
        'pjax' => true,
        'toggleData'=>false,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-invoice']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
    ]); ?>

</div>
