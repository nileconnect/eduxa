<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use trntv\filekit\widget\Upload;
use yii\web\JsExpression;
use kartik\depdrop\DepDrop;
use \common\helpers\multiLang\MyMultiLanguageActiveField;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Schools */
/* @var $form yii\widgets\ActiveForm */
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'SchoolRating',
        'relID' => 'school-rating',
        'value' => \yii\helpers\Json::encode($model->schoolRatings),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'SchoolVideos',
        'relID' => 'school-videos',
        'value' => \yii\helpers\Json::encode($model->schoolVideos),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);

?>

<div class="schools-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>


    <div class="row">

        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="well">
                        <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title'])->widget(MyMultiLanguageActiveField::className());  ?>
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
                            'data' =>$model->country_id ?  \yii\helpers\ArrayHelper::map(\backend\models\City::find()->where(['country_id'=>$model->country_id])->asArray()->all(), 'id', 'title') : [],

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
                <?= $form->field($model, 'featured')->checkbox() ; ?>


            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'course_type')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\SchoolsCourseTypes::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
                'options' => ['placeholder' => Yii::t('backend', 'Choose Schools course types')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'discount')->textInput(['placeholder' => 'Discount']) ?>
        </div>

    </div>




    <?= $form->field($model, 'details')->textarea(['maxlength' => 255, 'rows'=>3])
        ->widget(MyMultiLanguageActiveField::className(), ['inputType'=>'textArea', 'inputOptions'=>[
            'rows'=>3,
            'class'=>'form-control',
        ]]) ?>




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




    <div class="row">
        <div class="col-md-4 col-sm-12">
            <?= $form->field($model, 'min_age')->textInput(['placeholder' => 'Min Age'])->widget(MyMultiLanguageActiveField::className());  ?>

        </div>

        <div class="col-md-4 col-sm-12">
            <?= $form->field($model, 'start_every')->textInput(['maxlength' => true, 'placeholder' => 'Start Every'])->widget(MyMultiLanguageActiveField::className());  ?>

        </div>

        <div class="col-md-4 col-sm-12">
            <?= $form->field($model, 'study_time')->textInput(['maxlength' => true, 'placeholder' => 'Study Time'])->widget(MyMultiLanguageActiveField::className());  ?>

        </div>
    </div>




    <div class="row">
        <div class="col-md-4 col-sm-12">
            <?= $form->field($model, 'max_students_per_class')->textInput(['placeholder' => 'Max Students Per Class']) ?>

        </div>

        <div class="col-md-4 col-sm-12">
            <?= $form->field($model, 'avg_students_per_class')->textInput(['placeholder' => 'Avg Students Per Class']) ?>

        </div>

        <div class="col-md-4 col-sm-12">
            <?= $form->field($model, 'lessons_per_week')->textInput(['placeholder' => 'Lessons Per Week']) ?>

        </div>
    </div>


    <div class="row">
        <div class="col-md-4 col-sm-12">
            <?= $form->field($model, 'hours_per_week')->textInput(['placeholder' => 'Hours Per Week']) ?>

        </div>

        <div class="col-md-4 col-sm-12">
            <?= $form->field($model, 'accomodation_fees')->textInput(['placeholder' => 'Accomodation Fees']) ?>

        </div>

        <div class="col-md-4 col-sm-12">
            <?= $form->field($model, 'registeration_fees')->textInput(['placeholder' => 'Registeration Fees']) ?>

        </div>
    </div>


    <div class="row">
        <div class="col-md-4 col-sm-12">
            <?= $form->field($model, 'study_books_fees')->textInput(['placeholder' => 'Study Books Fees']) ?>

        </div>

        <div class="col-md-4 col-sm-12">
            <?= $form->field($model, 'fees_per_week')->textInput(['placeholder' => 'Fees Per Week']) ?>

        </div>

        <div class="col-md-4 col-sm-12">
        </div>
    </div>



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
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('backend', 'SchoolRating')),
            'content' => $this->render('_formSchoolRating', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->schoolRatings),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('backend', 'SchoolVideos')),
            'content' => $this->render('_formSchoolVideos', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->schoolVideos),
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
