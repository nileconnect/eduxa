<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->universityPrograms,
        'key' => 'id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        'title',
        [
                'attribute' => 'major.title',
                'label' => Yii::t('backend', 'Major')
            ],
        [
                'attribute' => 'degree.title',
                'label' => Yii::t('backend', 'Degree')
            ],
        [
                'attribute' => 'field.title',
                'label' => Yii::t('backend', 'Field')
            ],
        'country_id',
        'city_id',
        'study_start_date',
        'study_duration',
        'study_method',
        'attendance_type',
        'annual_cost',
        'conditional_admissions',
        'toefl',
        'ielts',
        'bank_statment',
        'high_school_transcript',
        'bachelor_degree',
        'certificate',
        'note1:ntext',
        'note2:ntext',
        'total_rating',
        'program_type',
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'university-programs'
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
