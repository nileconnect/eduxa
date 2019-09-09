<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Country */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Country'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-view">

    <div class="row">
        <!-- <div class="col-sm-9">
            <h2><?= Yii::t('backend', 'Country').' '. Html::encode($this->title) ?></h2>
        </div> -->
        <div class="col-sm-3">
            
            <?= Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <? /*= Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])*/
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'title',
        'code',
        'intro:ntext',
        'details:html',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    
    <div class="row">
<?php
if($providerCountryAttachment->totalCount){
    $gridColumnCountryAttachment = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
        'name',

        'type',
            'size',
              [
                  'label'=>'image path',
                  'format'=>'raw',
                  'value'=>function($model){
                    return "<a href='".$model->base_url.'/'.$model->path."'>file</a>";
                  }
              ],

                ];
    echo Gridview::widget([
        'dataProvider' => $providerCountryAttachment,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-country-attachment']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('backend', 'Country Attachment')),
        ],
        'export' => false,
        'columns' => $gridColumnCountryAttachment
    ]);
}
?>

    </div>
</div>
