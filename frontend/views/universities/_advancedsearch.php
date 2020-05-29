<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\depdrop\DepDrop;


/* @var $this yii\web\View */
/* @var $model backend\models\search\UniversityProgramsSearch */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="search-form after-jumbotron">
    <div class="container">
        <div class="text-white">
            <h2>Are you interested in studying abroad?</h2>
            <h5>Find, Review and Apply to the best universities in the world</h5>
        </div>
        <?php $form = ActiveForm::begin([
            'action' => ['/universities/search'],
            'method' => 'get',
            'class'=>'inline mtmd shadow-sm'
        ]);
        ?>
        <div class="form-group-row">
            <div class="form-group has-search">
                <span class="fa fa-search form-control-feedback"></span>
                <?= $form->field($model,'university_title')->textInput(['placeholder'=>'Search'])->label(false)?>
<!--                <input type="text" class="form-control" placeholder="Search" name="UniversityProgramsSearch[university_title]">-->
            </div>
        </div>
        <div class="form-group-row">
            <div class="form-group">
                <?= $form->field($model, 'degree_id')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\UniversityProgramDegree::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
                    'options' => ['placeholder' => Yii::t('backend', 'Degree Level')],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'class'=>'select-wrapper'
                    ],
                ])->label(false); ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'field_id')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\UniversityProgramField::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
                    'options' => ['placeholder' => Yii::t('backend', 'Field')],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'class'=>'select-wrapper'
                    ],
                ])->label(false); ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'major_id')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\UniversityProgramMajors::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
                    'options' => ['placeholder' => Yii::t('backend', 'Major')],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false); ?>
            </div>

            <div class="form-group">
                <?= $form->field($model, 'university_id')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\University::find()->where(['status'=>1])->orderBy('id')->asArray()->all(), 'id', 'title'),
                    'options' => ['placeholder' => Yii::t('backend', 'University')],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false); ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'university_total_rating')->widget(\kartik\widgets\Select2::classname(), [
                    'data' =>['1'=>'1' , '2'=>'2' ,'3'=>'3' ,'4'=>'4' ,'5'=>'5'],
                    'options' => ['placeholder' => Yii::t('backend', 'University rating')],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false); ?>

            </div>



        </div>
        <div class="form-group-row">

            <div class="form-group">
                <?= $form->field($model, 'country_id')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Country::find()->where(['status'=>1])->orderBy('id')->asArray()->all(), 'id', 'title'),
                    'options' => ['placeholder' => Yii::t('common', 'Country') ,'id'=>'CountryId'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false); ?>
            </div>
            
                <?php
                // Child # 1
                echo $form->field($model, 'state_id')->widget(DepDrop::classname(), [
                    'data' =>$model->country_id ?  \yii\helpers\ArrayHelper::map(\backend\models\State::find()->where(['country_id'=>$model->country_id])->asArray()->all(), 'id', 'title') : [],
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
                    'data' =>$model->country_id ?  \yii\helpers\ArrayHelper::map(\backend\models\Cities::find()->where(['state_id'=>$model->city_id])->asArray()->all(), 'id', 'title') : [],
                    'options'=>['id'=>'subcat-id'],
                    'pluginOptions'=>[
                        'depends'=>['City-id'],
                        'placeholder'=>Yii::t('common', 'City'),
                        'url'=>Url::to(['/helper/cities'])
                    ]
                ])->label(false); 
                ?>

                
          
            <div class="form-group">
                <?= $form->field($model, 'university_nextTo')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\UniversityNextTo::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
                    'options' => ['placeholder' => Yii::t('backend', 'University next to')],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false); ?>

            </div>

            <div class="form-group">
                <button type="submit" class="button btn-block button-accent">Search</button>
            </div><form action="" method="" class="inline mtmd shadow-sm">

        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
