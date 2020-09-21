<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use common\helpers\multiLang\MyMultiLanguageActiveField;
/* @var $this yii\web\View */
/* @var $model backend\models\UniversityPrograms */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'UniversityProgStartdate',
        'relID' => 'university-prog-startdate',
        'value' => \yii\helpers\Json::encode($model->universityProgStartdates),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);

?>
<style>
    ul.MyMenu > li {
        display: inline-block;
        margin-right: 38px;
        /* You can also add some margins here to make it look prettier */
        zoom:1;
        *display:inline;
        /* this fix is needed for IE7- */
    }
</style>
<div class="university-programs-form">

    <?php
    $this->beginContent('@app/views/public/multi-lang.php');
    $this->endContent();
    ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>
    <?php $form->errorSummary($modelStartDates); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>






<!--    <div class="row">-->
<!--        <div class="col-md-6 col-sm-12">-->
<!---->
<!--            RIGHT-->
<!--        </div>-->
<!---->
<!--        <div class="col-md-6 col-sm-12">-->
<!--            LEFT-->
<!--        </div>-->
<!--    </div>-->


    <div class="row">
        <div class="col-md-6 col-sm-12">

            <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title'])->widget(MyMultiLanguageActiveField::className());  ?>

        </div>

        <div class="col-md-6 col-sm-12">

            <?= $form->field($model, 'lang_of_study')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\UniversityLangOfStudy::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
                'options' => ['placeholder' => Yii::t('backend', 'Choose Language')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>
    </div>



    <div class="row">
        <div class="col-md-6 col-sm-12">
        <?= $form->field($model, 'major_id')->widget(\kartik\widgets\Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map(\backend\models\UniversityProgramMajors::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
            'options' => ['placeholder' => Yii::t('backend', 'Choose University program majors')],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
        </div>
        <div class="col-md-6 col-sm-12">
<!--            --><?//= $form->field($model, 'medium_of_study')->widget(\kartik\widgets\Select2::classname(), [
//                'data' => \yii\helpers\ArrayHelper::map(\backend\models\UniversityProgramMediumOfStudy::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
//                'options' => ['placeholder' => Yii::t('backend', 'Choose Medium of study')],
//                'pluginOptions' => [
//                    'allowClear' => true
//                ],
//            ]); ?>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'degree_id')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\UniversityProgramDegree::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
                'options' => ['placeholder' => Yii::t('backend', 'Choose University program degree')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>

        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'field_id')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\UniversityProgramField::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
                'options' => ['placeholder' => Yii::t('backend', 'Choose University program field')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>

        </div>
<!--        <div class="col-md-4 col-sm-12">-->
<!--            --><?//= $form->field($model, 'program_type')->textInput(['placeholder' => 'Program Type']) ?>
<!---->
<!--        </div>-->
    </div>


    <div class="row ">
        <div class="col-md-6 col-sm-12">
            <div class="well">
               Start Dates
                <ul class="MyMenu">
                   <li><?= $form->field($modelStartDates, 'm_1')->checkbox(); ?></li>
                   <li><?= $form->field($modelStartDates, 'm_2')->checkbox(); ?></li>
                   <li><?= $form->field($modelStartDates, 'm_3')->checkbox(); ?></li>
                   <li><?= $form->field($modelStartDates, 'm_4')->checkbox(); ?></li>
                   <li><?= $form->field($modelStartDates, 'm_5')->checkbox(); ?></li>
                   <li><?= $form->field($modelStartDates, 'm_6')->checkbox(); ?></li>
               </ul>
                <ul class="MyMenu">
                    <li><?= $form->field($modelStartDates, 'm_7')->checkbox(); ?></li>
                    <li><?= $form->field($modelStartDates, 'm_8')->checkbox(); ?></li>
                    <li><?= $form->field($modelStartDates, 'm_9')->checkbox(); ?></li>
                    <li><?= $form->field($modelStartDates, 'm_10')->checkbox(); ?></li>
                    <li><?= $form->field($modelStartDates, 'm_11')->checkbox(); ?></li>
                    <li><?= $form->field($modelStartDates, 'm_12')->checkbox(); ?></li>
                </ul>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 well">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <?= $form->field($model, 'study_duration_no')->textInput();  ?>
                </div>

                <div class="col-md-6 col-sm-12">
                    <?= $form->field($model, 'study_duration')->dropDownList(['1'=>'Day' , '2'=>'Week' , '3'=>'Month','4'=>'Year'])  ?>
                </div>
            </div>




        </div>

    </div>
    <div class="row ">
        <div class="col-md-6 col-sm-12">
            <div class="well">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <?php
                        echo $form->field($model, 'first_submission_date')->widget(DatePicker::classname(), [
                            'options' => ['placeholder' => 'Enter First submission date ...'],
                            'pluginOptions' => [
                                'autoclose'=>true,
                                'format' => 'yyyy-mm-dd'

                            ]
                        ]);
                        ?>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <?php
                        echo $form->field($model, 'first_submission_date_active')->checkbox(['label'=>'Active']);

                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 ">
            <div class="well">

           <div class="row">
                <div class="col-md-6 col-sm-12">
                    <?php
                    echo $form->field($model, 'last_submission_date')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'Enter last submission date ...'],
                        'pluginOptions' => [
                            'autoclose'=>true,
                            'format' => 'yyyy-mm-dd'

                        ]
                    ]);
                    ?>
                </div>
                <div class="col-md-6 col-sm-12">
                    <?php
                    echo $form->field($model, 'last_submission_date_active')->checkbox(['label'=>'Active']);

                    ?>
                </div>
            </div>


            </div>
        </div>


    </div>

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'study_method')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\UniversityProgrameMethodOfStudy::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
                'options' => ['placeholder' => Yii::t('backend', 'Choose Method of Study')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>

        </div>

        <div class="col-md-6 col-sm-12">

            <?= $form->field($model, 'program_format')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\UniversityProgrameFormat::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
                'options' => ['placeholder' => Yii::t('backend', 'Choose Program format')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>

            <? //= $form->field($model, 'attendance_type')->textInput(['maxlength' => true, 'placeholder' => 'Attendance Type'])->widget(MyMultiLanguageActiveField::className());  ?>

        </div>
    </div>




    <div class="row">
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'conditional_admissions')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\UniversityProgrameConditionalAdmission::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
                'options' => ['placeholder' => Yii::t('backend', 'Choose conditional admissions')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>

        </div>

        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'ielts')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\UniversityProgrameIlets::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
                'options' => ['placeholder' => Yii::t('backend', 'Choose IELTS')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>
    </div>

    <div class="row">


        <div class="col-md-6 col-sm-12 ">
            <div class="well">

                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <?php
                        echo $form->field($model, 'bank_statment')->widget(\kartik\number\NumberControl::classname(), [
                            'maskedInputOptions' => [
                                // 'prefix' => $model->university->currency->currency_code,
                                'suffix' => ' '. $model->university->currency->currency_code,
                                'allowMinus' => false
                            ],
                            'options' =>  [
                                'type' => 'text',
                                'label'=>'<label>Saved Value: </label>',
                                'class' => 'kv-saved',
                                'readonly' => true,
                                'tabindex' => 1000
                            ],
                            'displayOptions' => ['class' => 'form-control kv-monospace'],
                            'saveInputContainer' => ['class' => 'kv-saved-cont']
                        ]);

                        ?>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <?php
                        echo $form->field($model, 'bank_statment_active')->checkbox(['label'=>'Active']);

                        ?>
                    </div>
                </div>


            </div>
        </div>




        <div class="col-md-6 col-sm-12">
            <div class="well">

            <?php
            echo $form->field($model, 'annual_cost')->widget(\kartik\number\NumberControl::classname(), [
                'maskedInputOptions' => [
                    // 'prefix' => $model->university->currency->currency_code,
                    'suffix' => ' '. $model->university->currency->currency_code,
                    'allowMinus' => false
                ],
                'options' =>  [
                    'type' => 'text',
                    'label'=>'<label>Saved Value: </label>',
                    'class' => 'kv-saved',
                    'readonly' => true,
                    'tabindex' => 1000
                ],
                'displayOptions' => ['class' => 'form-control kv-monospace'],
                'saveInputContainer' => ['class' => 'kv-saved-cont']
            ]);

            ?>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'toefl')->textInput(['maxlength' => true, 'placeholder' => 'Toefl']);  ?>

        </div>

        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'high_school_transcript')->textInput(['maxlength' => true, 'placeholder' => 'High School Transcript'])->widget(MyMultiLanguageActiveField::className());  ?>
        </div>
    </div>




    <div class="row">
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'bachelor_degree')->textInput(['maxlength' => true, 'placeholder' => 'Bachelor Degree certificate'])->widget(MyMultiLanguageActiveField::className());  ?>
        </div>

<!--        <div class="col-md-6 col-sm-12">-->
<!--            --><?//= $form->field($model, 'certificate')->textInput(['maxlength' => true, 'placeholder' => 'Certificate'])->widget(MyMultiLanguageActiveField::className());  ?>
<!---->
<!--        </div>-->
    </div>


    <div class="row">
        <div class="col-md-6 col-sm-12">

            <?= $form->field($model, 'note1')->textarea(['maxlength' => 255, 'rows'=>3])
                ->widget(MyMultiLanguageActiveField::className(), ['inputType'=>'textArea', 'inputOptions'=>[
                    'rows'=>3,
                    'class'=>'form-control',
                ]]) ?>
        </div>

        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'note2')->textarea(['maxlength' => 255, 'rows'=>3])
                ->widget(MyMultiLanguageActiveField::className(), ['inputType'=>'textArea', 'inputOptions'=>[
                    'rows'=>3,
                    'class'=>'form-control',
                ]]) ?>

        </div>
    </div>





    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
