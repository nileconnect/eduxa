<?php
use yii\helpers\Html;
use kartik\tabs\TabsX;
use yii\helpers\Url;
$items = [
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('backend', 'University')),
        'content' => $this->render('_detail', [
            'model' => $model,
        ]),
    ],
        [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('backend', 'University Accredited Countries')),
        'content' => $this->render('_dataUniversityAccreditedCountries', [
            'model' => $model,
            'row' => $model->universityAccreditedCountries,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('backend', 'University Photos')),
        'content' => $this->render('_dataUniversityPhotos', [
            'model' => $model,
            'row' => $model->universityPhotos,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('backend', 'University Programs')),
        'content' => $this->render('_dataUniversityPrograms', [
            'model' => $model,
            'row' => $model->universityPrograms,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('backend', 'University Videos')),
        'content' => $this->render('_dataUniversityVideos', [
            'model' => $model,
            'row' => $model->universityVideos,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('backend', 'Unversity Rating')),
        'content' => $this->render('_dataUnversityRating', [
            'model' => $model,
            'row' => $model->unversityRatings,
        ]),
    ],
    ];
echo TabsX::widget([
    'items' => $items,
    'position' => TabsX::POS_ABOVE,
    'encodeLabels' => false,
    'class' => 'tes',
    'pluginOptions' => [
        'bordered' => true,
        'sideways' => true,
        'enableCache' => false
    ],
]);
?>
