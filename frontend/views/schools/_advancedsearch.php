<?php

use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\depdrop\DepDrop;
use backend\models\SchoolCourse;


/* @var $this yii\web\View */
/* @var $model backend\models\search\UniversityProgramsSearch */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="search-form after-jumbotron">
    <div class="container">
        <div class="text-white">
            <h2><?= Yii::t('frontend','Are you interested in studying abroad?') ?></h2>
            <h5><?= Yii::t('frontend','Find, Review and Apply to the best schools in the world') ?></h5>
        </div>
        <?php $form = ActiveForm::begin([
            'action' => ['/schools/search'],
            'method' => 'get',
            'class'=>'inline mtmd shadow-sm'
        ]);
        ?>
        <div class="form-group-row">
            <div class="form-group has-search">
                <span class="fa fa-search form-control-feedback"></span>
                <?= $form->field($model,'title')->textInput(['placeholder'=>Yii::t('frontend','Search')])->label(false)?>
                <!-- <input type="text" class="form-control" placeholder="<?= Yii::t('frontend','Search') ?> " name="SchoolCourseSearch[title]"> -->
            </div>
        </div>
        <div class="form-group-row">
            <div class="form-group">
                <?= $form->field($model, 'school_course_study_language_id')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\SchoolCourseStudyLanguage::find()->orderBy('id')->all(), 'id', 'title'),
                    'options' => ['placeholder' => Yii::t('frontend', 'Study Language')],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false); ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'required_level')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => SchoolCourse::ListLevels(),
                    'options' => ['placeholder' => Yii::t('frontend', 'Required Level')],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'class'=>'select-wrapper'
                    ],
                ])->label(false); ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'school_course_type_id')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\SchoolCourseType::find()->orderBy('id')->all(), 'id', 'title'),
                    'options' => ['placeholder' => Yii::t('frontend', 'Course Type')],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false); ?>
            </div>
            
            
            <!-- <div class="form-group">
                <?php  
                /*
                $form->field($model, 'time_of_course')->widget(\kartik\widgets\Select2::classname(), [
                    'data' =>SchoolCourse::ListCourseTime(),
                    'options' => ['placeholder' => Yii::t('frontend', 'Course Time')],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'class'=>'select-wrapper'
                    ],
                ])->label(false);
                */
                ?>
            </div> -->

            <div class="form-group">
                <?= $form->field($model, 'country_id')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Country::find()->where(['status'=>1])->orderBy('id')->all(), 'id', 'title'),
                    'options' => ['placeholder' => Yii::t('common', 'Country') ,'id'=>'CountryId'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false); ?>
            </div>
            
            <?php
            // Child # 1
            echo $form->field($model, 'state_id')->widget(DepDrop::classname(), [
                'data' =>$model->country_id ?  \yii\helpers\ArrayHelper::map(\backend\models\State::find()->where(['country_id'=>$model->country_id])->all(), 'id', 'title') : [''=>Yii::t('common','State')],
                'options'=>['id'=>'City-id'],
                'pluginOptions'=>[
                    'depends'=>['CountryId'],
                    'placeholder'=>Yii::t('common', 'State'),
                    'url'=>Url::to(['/helper/states'])
                ]
            ])->label(false); 

            ?>
        
            <?php
            // Child # 1
            echo $form->field($model, 'city_id')->widget(DepDrop::classname(), [
                'data' =>$model->country_id ?  \yii\helpers\ArrayHelper::map(\backend\models\Cities::find()->where(['state_id'=>$model->state_id])->all(), 'id', 'title') : [''=>Yii::t('common','City')],
                'options'=>['id'=>'subcat-id'],
                'pluginOptions'=>[
                    'depends'=>['City-id'],
                    'placeholder'=>Yii::t('common', 'City'),
                    'url'=>Url::to(['/helper/cities'])
                ]
            ])->label(false); 
            ?>

        </div>
        <div class="form-group-row">

            <div class="form-group">
                <?= $form->field($model, 'school_id')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Schools::find()->where(['status'=>1])->orderBy('id')->all(), 'id', 'title'),
                    'options' => ['placeholder' => Yii::t('frontend', 'School')],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false); ?>
            </div>

            <div class="form-group">
                <?= $form->field($model, 'school_nextTo')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\SchoolNextTo::find()->orderBy('id')->all(), 'id', 'title'),
                    'options' => ['placeholder' => Yii::t('frontend', 'School next to')],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false); ?>

            </div>

            <div class="form-group">
                <?= $form->field($model, 'school_total_rating')->widget(\kartik\widgets\Select2::classname(), [
                    'data' =>['1'=>'1' , '2'=>'2' ,'3'=>'3' ,'4'=>'4' ,'5'=>'5'],
                    'options' => ['placeholder' => Yii::t('frontend', 'School rating')],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false); ?>

            </div>

            <div class="form-group">
                <?= $form->field($model, 'featured')->widget(\kartik\widgets\Select2::classname(), [
                    'data' =>['1'=>Yii::t('frontend','Recommended'),'0'=> Yii::t('frontend','Not Recommended')],
                    'options' => ['placeholder' => Yii::t('frontend', 'Sort')],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false); ?>

            </div>
          
            

            <div class="form-group">
                <button type="submit" class="button btn-block button-accent"><?= Yii::t('frontend','Search') ?></button>
            </div><form action="" method="" class="inline mtmd shadow-sm">

        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
