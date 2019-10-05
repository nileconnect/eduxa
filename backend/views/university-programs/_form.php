<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use webvimark\behaviors\multilanguage\input_widget\MultiLanguageActiveField;

/* @var $this yii\web\View */
/* @var $model backend\models\UniversityPrograms */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="university-programs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

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

            <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title']) ?>


        </div>

        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'major_id')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\UniversityProgramMajors::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
                'options' => ['placeholder' => Yii::t('backend', 'Choose University program majors')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>
    </div>



    <div class="row">
        <div class="col-md-4 col-sm-12">
            <?= $form->field($model, 'degree_id')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\UniversityProgramDegree::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
                'options' => ['placeholder' => Yii::t('backend', 'Choose University program degree')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>

        <div class="col-md-4 col-sm-12">
            <?= $form->field($model, 'field_id')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\UniversityProgramField::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
                'options' => ['placeholder' => Yii::t('backend', 'Choose University program field')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>

        </div>
        <div class="col-md-4 col-sm-12">
            <?= $form->field($model, 'program_type')->textInput(['placeholder' => 'Program Type']) ?>

        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="well">
                <?= $form->field($model, 'country_id')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Country::find()->orderBy('id')->all(), 'id', 'title'),
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

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'study_start_date')->textInput(['maxlength' => true, 'placeholder' => 'Study Start Date']) ?>

        </div>

        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'study_duration')->textInput(['maxlength' => true, 'placeholder' => 'Study Duration']) ?>

        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'study_method')->textInput(['maxlength' => true, 'placeholder' => 'Study Method']) ?>

        </div>

        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'attendance_type')->textInput(['maxlength' => true, 'placeholder' => 'Attendance Type']) ?>

        </div>
    </div>






    <div class="row">
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'annual_cost')->textInput(['placeholder' => 'Annual Cost']) ?>
        </div>

        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'conditional_admissions')->textInput(['maxlength' => true, 'placeholder' => 'Conditional Admissions']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'toefl')->textInput(['maxlength' => true, 'placeholder' => 'Toefl']) ?>

        </div>

        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'ielts')->textInput(['maxlength' => true, 'placeholder' => 'Ielts']) ?>

        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'bank_statment')->textInput(['maxlength' => true, 'placeholder' => 'Bank Statment']) ?>
        </div>

        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'high_school_transcript')->textInput(['maxlength' => true, 'placeholder' => 'High School Transcript']) ?>
        </div>
    </div>




    <div class="row">
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'bachelor_degree')->textInput(['maxlength' => true, 'placeholder' => 'Bachelor Degree']) ?>
        </div>

        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'certificate')->textInput(['maxlength' => true, 'placeholder' => 'Certificate']) ?>

        </div>
    </div>


    <div class="row">
        <div class="col-md-6 col-sm-12">

            <?= $form->field($model, 'note1')->textarea(['rows' => 6]) ?>
        </div>

        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'note2')->textarea(['rows' => 6]) ?>

        </div>
    </div>





    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
