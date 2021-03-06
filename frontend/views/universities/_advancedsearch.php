<?php

use yii\helpers\Url;
use yii\helpers\Html;
use backend\models\State;
use backend\models\Cities;
use kartik\depdrop\DepDrop;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model backend\models\search\UniversityProgramsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
.form-control:disabled, .form-control[readonly] {
    background-color: white;
    opacity: 1;
}
</style>

<div class="search-form after-jumbotron">
    <div class="container">
        <div class="text-white">
            <h2><?= Yii::t('frontend','Are you interested in studying abroad?') ?></h2>
            <h5><?= Yii::t('frontend','Search & Apply to best universities in the world') ?></h5>
        </div>
        <?php $form = ActiveForm::begin([
                'id'=>'UniversityFormSu',
            'action' => ['/universities/search'],
            'method' => 'get',
            'class'=>'inline mtmd shadow-sm'
        ]);
        ?>
        <div class="form-group-row">
            <div class="form-group has-search">
                <span class="fa fa-search form-control-feedback"></span>
                <?= $form->field($model,'university_title')->textInput(['placeholder'=>Yii::t('frontend','Enter university name')])->label(false)?>
<!--                <input type="text" class="form-control" placeholder="Search" name="UniversityProgramsSearch[university_title]">-->
            </div>
        </div>
        <div class="form-group" id="searchBtnMob">
                <button type="submit" class="button btn-block button-accent" ><?= Yii::t('frontend','Search') ?></button>
                <a href="javascript:void(0)" class="button btn-block button-accent" onclick="showfilters()"><?= Yii::t('frontend','Filters') ?></a>

            </div>
        <div class="form-group-row" id="searchfilters">
            <div class="form-group">
                <?= $form->field($model, 'degree_id')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => ['0'=> Yii::t('common','All Degrees')] + \yii\helpers\ArrayHelper::map(\backend\models\UniversityProgramDegree::find()->orderBy('id')->all(), 'id', 'title'),
                    'options' => ['placeholder' => Yii::t('frontend', 'Degree Level')],
                    'pluginOptions' => [
                        'allowClear' => false,
                        'class'=>'select-wrapper'
                    ],
                ])->label(false); ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'field_id')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => ['0'=> Yii::t('common','All Fields')] + \yii\helpers\ArrayHelper::map(\backend\models\UniversityProgramField::find()->orderBy('id')->all(), 'id', 'title'),
                    'options' => ['placeholder' => Yii::t('frontend', 'Field')],
                    'pluginOptions' => [
                        'allowClear' => false,
                        'class'=>'select-wrapper'
                    ],
                ])->label(false); ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'major_id')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => ['0'=> Yii::t('common','All Majors')] + \yii\helpers\ArrayHelper::map(\backend\models\UniversityProgramMajors::find()->orderBy('id')->all(), 'id', 'title'),
                    'options' => ['placeholder' => Yii::t('frontend', 'Major')],
                    'pluginOptions' => [
                        'allowClear' => false
                    ],
                ])->label(false); ?>
            </div>

            <div class="form-group">
                <?= $form->field($model, 'university_id')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\University::find()->where(['status'=>1])->orderBy('id')->all(), 'id', 'title'),
                    'options' => ['placeholder' => Yii::t('frontend', 'University')],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false); ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'university_total_rating')->widget(\kartik\widgets\Select2::classname(), [
                    'data' =>['1'=>'1' , '2'=>'2' ,'3'=>'3' ,'4'=>'4' ,'5'=>'5'],
                    'options' => ['placeholder' => Yii::t('frontend', 'University rating')],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false); ?>

            </div>



        </div>
        
        <div class="form-group-row" id="searchfilters2">

            <div class="form-group">
                <?= $form->field($model, 'country_id')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => ["0"=>Yii::t('frontend' , 'All Countries') ]  + \yii\helpers\ArrayHelper::map(\backend\models\Country::find()->where(['status'=>1])->orderBy('id')->all(), 'id', 'title'),
                    'options' => ['placeholder' => Yii::t('common', 'Country') ,'id'=>'CountryId'],
//                    'pluginOptions' => [
//                        'allowClear' => false
//                    ],
                ])->label(false); ?>
            </div>
            
                <?php
                // Child # 1
                echo $form->field($model, 'state_id')->widget(DepDrop::classname(), [
                    'data' =>$model->country_id ?  [''=>Yii::t('common', 'Select State..')] + ArrayHelper::map(State::find()->where(['country_id'=>$model->country_id])->all(), 'id', 'title') : [''=>Yii::t('common','Select State..')],
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
                $data = [];
                if($model->country_id){
                    $oneState = State::find()->where(['country_id'=>$model->country_id])->one();
                    $data = [''=>Yii::t('common', 'Select City..')] + ArrayHelper::map(Cities::find()->where(['state_id'=>$oneState->id])->all(), 'id', 'title');
                }
                
                echo $form->field($model, 'city_id')->widget(DepDrop::classname(), [
                    'data' => $model->country_id ?  $data : [''=>Yii::t('common','Select City..')],
                    'options'=>['id'=>'subcat-id','placeholder' => Yii::t('common', 'Select City..')],
                    'pluginOptions'=>[
                        'depends'=>['City-id'],
                        'url'=>Url::to(['/helper/cities'])
                    ]
                ])->label(false); 
                ?>

                
          
            <div class="form-group">
                <?= $form->field($model, 'university_nextTo')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\UniversityNextTo::find()->orderBy('id')->all(), 'id', 'title'),
                    'options' => ['placeholder' => Yii::t('frontend', 'University next to')],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false); ?>

            </div>

            <?php

           // echo $form->field($model, 'sorting')->hiddenInput(['id'=>"Sortigff"])->label(false);
            ?>
<!--            <div class="form-group">-->
<!--                --><?//= $form->field($model, 'sorting')->widget(\kartik\widgets\Select2::classname(), [
//                    'data' =>['1'=>'Recommended','0'=>'Not Recommended','2'=> Yii::t('frontend','Price Ascending'),'3'=>  Yii::t('frontend','Price Descending')],
//                    'options' => ['placeholder' => Yii::t('frontend', 'Sort')],
//                    'pluginOptions' => [
//                        'allowClear' => true
//                    ],
//                ])->label(false); ?>
<!---->
<!--            </div>-->

            <input type="hidden" id="universityprogramssearch-sorting" name="UniversityProgramsSearch[sorting]">

            <div class="form-group" id="searchBtnDesktop">
                <button type="submit" class="button btn-block button-accent"><?= Yii::t('frontend','Search') ?></button>
            </div>
            <div class="form-group" id="updateSearchMob">
                <button type="submit" class="button btn-block button-accent"><?= Yii::t('frontend','Update Search') ?></button>
            </div>
            

        </div>
        
        <?php ActiveForm::end(); ?>
    </div>
</div>
