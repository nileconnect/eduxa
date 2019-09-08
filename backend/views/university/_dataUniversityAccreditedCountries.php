<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->universityAccreditedCountries,
        'key' => ''
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        [
                'attribute' => 'country.title',
                'label' => Yii::t('backend', 'Country')
            ],
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'university-accredited-countries'
        ],
    ];
    
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'containerOptions' => ['style' => 'overflow: auto'],
        'pjax' => true,
        'beforeHeader' => [
            [
                'options' => ['class' => 'skip-export']
            ]
        ],
        'export' => [
            'fontAwesome' => true
        ],
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'showPageSummary' => false,
        'persistResize' => false,
    ]);
