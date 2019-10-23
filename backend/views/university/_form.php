<?php

use trntv\filekit\widget\Upload;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use kartik\depdrop\DepDrop;
use \common\helpers\multiLang\MyMultiLanguageActiveField;

/* @var $this yii\web\View */
/* @var $model backend\models\University */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'UniversityAccreditedCountries', 
        'relID' => 'university-accredited-countries', 
        'value' => \yii\helpers\Json::encode($model->universityAccreditedCountries),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'UniversityPhotos', 
        'relID' => 'university-photos', 
        'value' => \yii\helpers\Json::encode($model->universityPhotos),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'UniversityPrograms', 
        'relID' => 'university-programs', 
        'value' => \yii\helpers\Json::encode($model->universityPrograms),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'UniversityVideos', 
        'relID' => 'university-videos', 
        'value' => \yii\helpers\Json::encode($model->universityVideos),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'UnversityRating', 
        'relID' => 'unversity-rating', 
        'value' => \yii\helpers\Json::encode($model->unversityRatings),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="university-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>


    <div class="row">

        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="well">
                        <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title'])
                            ->widget(MyMultiLanguageActiveField::className(['class'=>'form-control dddd']));  ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="well">
                        <?= $form->field($model, 'status')->dropDownList([\backend\models\University::LisStatusList()])?>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="well">
                        <?= $form->field($model, 'country_id')->widget(\kartik\widgets\Select2::classname(), [
                            'data' => \yii\helpers\ArrayHelper::map(\backend\models\Country::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
                            'options' => ['placeholder' => Yii::t('backend', 'Choose Country') ,'id'=>'CountryId'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="well">
                        <?php
                        // Child # 1
                        echo $form->field($model, 'city_id')->widget(DepDrop::classname(), [
                            'options'=>['id'=>'subcat-id'],
                            'pluginOptions'=>[
                                'depends'=>['CountryId'],
                                'placeholder'=>'Select...',
                                'url'=>Url::to(['/helper/cities'])
                            ]
                        ]);

                        ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
                <?php echo $form->field($model, 'logo')->widget(
                    Upload::class,
                    [
                        'url' => ['/file/storage/upload'],
                        'maxFileSize' => 5000000, // 5 MiB
                    ]);
                ?>
                <br/>
                <?= $form->field($model, 'recommended')->checkbox() ?>


            </div>
        </div>
    </div>





    <?= $form->field($model, 'description')->textarea(['rows' => 6])->widget(MyMultiLanguageActiveField::className(), ['inputType'=>'textArea', 'inputOptions'=>[
        'rows'=>3,
        'class'=>'form-control',
    ]]) ?>



<!--    --><?php //echo $form->field($model, 'description')->widget(
//        \yii\imperavi\Widget::class,
//        [
//            'plugins' => ['fullscreen', 'fontcolor', 'video'],
//            'options' => [
//                'minHeight' => 400,
//                'maxHeight' => 400,
//                'buttonSource' => true,
//                'convertDivs' => false,
//                'removeEmptyTags' => true,
//                'imageUpload' => Yii::$app->urlManager->createUrl(['/file/storage/upload-imperavi']),
//            ],
//        ]
//    ) ?>

    <?= $form->field($model, 'detailed_address')->textInput(['maxlength' => true, 'placeholder' => 'Detailed Address']) ?>



    <div class="row">
        <div class="col-md-4 col-sm-12">
            <?= $form->field($model, 'location')->textInput([ 'id' => 'us2-address']) ?>

        </div>

        <div class="col-md-4 col-sm-12">
            <?= $form->field($model, 'lat')->textInput([ 'id' => 'us2-lat']) ?>

        </div>

        <div class="col-md-4 col-sm-12">
            <?= $form->field($model, 'lng')->textInput([ 'id' => 'us2-lon']) ?>

        </div>
    </div>




    <div class="row">
        <div class="col-md-6 col-sm-12">

    <?php
    echo \pigolab\locationpicker\LocationPickerWidget::widget([
        'key' => env('GOOGLE_MAP_KEY'), 	// require , Put your google map api key
        'options' => [
            'style' => 'width: 100%; height: 400px', // map canvas width and height
        ] ,
        'clientOptions' => [
            'location' => [
                'latitude'  => $model->lat == ''? env('START_LAT') : $model->lat ,
                'longitude' => $model->lng == ''? env('START_LNG') : $model->lng ,
            ],
            'radius'    => 300,
            'addressFormat' => 'street_number',
            'inputBinding' => [
                'latitudeInput'     => new JsExpression("$('#us2-lat')"),
                'longitudeInput'    => new JsExpression("$('#us2-lon')"),
                'radiusInput'       => new JsExpression("$('#us2-radius')"),
                'locationNameInput' => new JsExpression("$('#us2-address')")
            ]
        ]
    ]);
    ?>

        </div>
    </div>

    <? //= $form->field($model, 'total_rating')->textInput(['placeholder' => 'Total Rating']) ?>

    <? //= $form->field($model, 'no_of_ratings')->textInput(['placeholder' => 'No Of Ratings']) ?>



    <?php echo $form->field($model, 'photos')->widget(
        Upload::class,
        [
            'url' => ['/file/storage/upload'],
            'sortable' => true,
            'maxFileSize' => 10000000, // 10 MiB
            'maxNumberOfFiles' => 10,
        ]);
    ?>



    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('backend', 'University Accredited Countries')),
            'content' => $this->render('_formUniversityAccreditedCountries', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->universityAccreditedCountries),
            ]),
        ],



        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('backend', 'University Rating')),
            'content' => $this->render('_formUnversityRating', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->unversityRatings),
            ]),
        ],

        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('backend', 'University Videos')),
            'content' => $this->render('_formUniversityVideos', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->universityVideos),
            ]),
        ],

    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
