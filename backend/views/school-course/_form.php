<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\SchoolCourse;
use \common\helpers\multiLang\MyMultiLanguageActiveField;
/* @var $this yii\web\View */
/* @var $model backend\models\SchoolCourse */
/* @var $form yii\widgets\ActiveForm */


\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'SchoolCourseSessionCost',
        'relID' => 'school-course-session-cost',
        'value' => \yii\helpers\Json::encode($model->schoolCourseSessionCosts),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'SchoolCourseStartDate',
        'relID' => 'school-course-start-date',
        'value' => \yii\helpers\Json::encode($model->schoolCourseStartDates),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'SchoolCourseWeekCost',
        'relID' => 'school-course-week-cost',
        'value' => \yii\helpers\Json::encode($model->schoolCourseWeekCosts),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);

?>

<div class="schools-form">

    <?php
    $this->beginContent('@app/views/public/multi-lang.php');
    $this->endContent();
    ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

<?
    //= $form->field($model, 'school_id')->widget(\kartik\widgets\Select2::classname(), [
//        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Schools::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
//        'options' => ['placeholder' => Yii::t('backend', 'Choose Schools')],
//        'pluginOptions' => [
//            'allowClear' => true
//        ],
//    ]);
?>

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title'])->widget(MyMultiLanguageActiveField::className());  ?>
        </div>

        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'status')->dropDownList(\backend\models\University::LisStatusList(),[ 'prompt' => 'Select ..'])?>
        </div>
        
        <div class="col-md-4 col-sm-12">
    
            <?= $form->field($model, 'school_course_type_id')->widget(\kartik\widgets\Select2::classname(), [
                'data' =>
                \yii\helpers\ArrayHelper::map(\backend\models\SchoolCourseType::find()->orderBy('id')->asArray()->all(),
                'id', 'title'),
                'options' => ['placeholder' => Yii::t('backend', 'Choose Type')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>
        
        <div class="col-md-4 col-sm-12">
    
            <?= $form->field($model, 'school_course_study_language_id')->widget(\kartik\widgets\Select2::classname(), [
                'data' =>
                \yii\helpers\ArrayHelper::map(\backend\models\SchoolCourseStudyLanguage::find()->orderBy('id')->asArray()->all(),
                'id', 'title'),
                'options' => ['placeholder' => Yii::t('backend', 'Choose Language')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>
        <div class="col-md-4 col-sm-12">

            <?= $form->field($model, 'begining_of_study')->textInput(); ?>
        </div>
    </div>


    <div class="row">
        <div class="col-md-4 col-sm-12">
            <?= $form->field($model, 'min_age')->textInput(['placeholder' => 'Min Age']) ?>
        </div>

        <div class="col-md-4 col-sm-12">
            <?= $form->field($model, 'required_level')->dropDownList(SchoolCourse::ListLevels(),[ 'prompt' => 'Select Level']) ?>
        </div>
        <div class="col-md-4 col-sm-12">
           <?= $form->field($model, 'time_of_course')->dropDownList( SchoolCourse::ListCourseTime(),[ 'prompt' => 'Select ..']) ?>
        </div>

    </div>

    <div class="row">
        <div class="col-md-4 col-sm-12">
            <div class="well">
            <?php
            echo $form->field($model, 'study_books_fees')->widget(\kartik\number\NumberControl::classname(), [
                'maskedInputOptions' => [
                    // 'prefix' => $model->university->currency->currency_code,
                    'suffix' => ' '. $model->school->currency->currency_code,
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

        <div class="col-md-4 col-sm-12">
            <div class="well">
            <?php
             echo $form->field($model, 'registeration_fees')->widget(\kartik\number\NumberControl::classname(), [
                'maskedInputOptions' => [
                    // 'prefix' => $model->university->currency->currency_code,
                    'suffix' => ' '. $model->school->currency->currency_code,
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

        <div class="col-md-4 col-sm-12">
            <div class="well" style="height: 150px;">
              <?= $form->field($model, 'discount')->textInput(['placeholder' => 'Discount']) ?>
            </div>
        </div>

    

    </div>


    <div class="row">

        <div class="col-md-6 col-sm-12">
            <div class="well" style="height: 150px;">
              <?= $form->field($model, 'health_insurance')->textInput(['placeholder' => Yii::t('backend','Health Insurance')]) ?>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'lessons_per_week')->textInput(['placeholder' => 'Lessons Per Week']) ?>
        </div>

        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'lesson_duration')->textInput(['placeholder' => 'Lessons Duration']) ?>
        </div>
    </div>




<!--    <div class="row">-->
<!--        <div class="col-md-6 col-sm-12">-->
<!--            --><?//= $form->field($model, 'no_of_weeks')->textInput(['placeholder' => 'No Of Weeks']) ?>
<!--        </div>-->
<!---->
<!--        <div class="col-md-6 col-sm-12">-->
<!--            --><?//= $form->field($model, 'cost_per_week')->textInput(['placeholder' => 'Cost Per Week']) ?>
<!--        </div>-->
<!---->
<!--        <div class="col-md-6 col-sm-12">-->
<!--            --><?//= $form->field($model, 'required_attendance_duraion')->textInput(['maxlength' => true, 'placeholder' => 'Required Attendance Duraion']) ?>
<!---->
<!--        </div>-->
<!---->
<!--    </div>-->


    <div class="row">
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'max_no_of_students_per_class')->textInput(['placeholder' => 'Max No Of Students Per Class']) ?>
        </div>

        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'avg_no_of_students_per_class')->textInput(['placeholder' => 'Avg No Of Students Per Class']) ?>
        </div>
    </div>
    

    <?= $form->field($model, 'information')->textarea(['maxlength' => 255, 'rows'=>3])
        ->widget(MyMultiLanguageActiveField::className(), ['inputType'=>'textArea', 'inputOptions'=>[
            'rows'=>3,
            'class'=>'form-control',
        ]]) ?>

    <?= $form->field($model, 'requirments')->textarea(['maxlength' => 255, 'rows'=>3])
        ->widget(MyMultiLanguageActiveField::className(), ['inputType'=>'textArea', 'inputOptions'=>[
            'rows'=>3,
            'class'=>'form-control',
        ]]) ?>


    <div class="row">
        <div class="col-md-6 col-sm-12">
            <?= 
                $form->field($model, 'cost_type')->radioList(SchoolCourse::costType());
                // $form->field($model, 'cost_type')
                // ->dropDownList(
                //     SchoolCourse::costType()
                // );
            ?>
        </div>
    </div>
    <!-- <div class="row" style="margin-bottom:30px;">
        <div class="col-md-12">
            <div style="display:inline-block">Course cost per weeks</div>
            <div class="material-switch" style="margin: 0 20px; display:inline-block">
                <input id="someSwitchOptionDefault" name="someSwitchOption001" type="checkbox"/>
                <label for="someSwitchOptionDefault" class="label-default"></label>
            </div>
            <div style="display:inline-block">Course cost per Session</div>
        </div>
    </div> -->

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('backend', 'Course Start Dates')),
            'content' => $this->render('_formSchoolCourseStartDate', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->schoolCourseStartDates),
            ]),
        ],

        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('backend', 'Course Cost Per Week')),
            'content' => $this->render('_formSchoolCourseWeekCost', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->schoolCourseWeekCosts),
            ]),
        ],

        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('backend', 'Course Cost Per Session')),
            'content' => $this->render('_formSchoolCourseSessionCost', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->schoolCourseSessionCosts),
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
