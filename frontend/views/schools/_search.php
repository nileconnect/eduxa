<?php

use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

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
                    <input type="text" class="form-control" placeholder="<?= Yii::t('frontend','Search') ?> " name="SchoolCourseSearch[title]">
                </div>
            </div>
            <div class="form-group-row">
                <div class="form-group">
                    <?= $form->field($model, 'school_course_type_id')->widget(\kartik\widgets\Select2::classname(), [
                        'data' => \yii\helpers\ArrayHelper::map(\backend\models\SchoolCourseType::find()->orderBy('id')->all(), 'id', 'title'),
                        'options' => ['placeholder' => Yii::t('frontend', 'Course Type')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label(false); ?>
                </div>
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
                    <?= $form->field($model, 'country_id')->widget(\kartik\widgets\Select2::classname(), [
                        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Country::find()->where(['status'=>1])->orderBy('id')->all(), 'id', 'title'),
                        'options' => ['placeholder' => Yii::t('common', 'Country') ,'id'=>'CountryId'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label(false); ?>
                </div>
                <div class="form-group">
                    <?php
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
                </div>
                <div class="form-group">
                    <?php
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
                <div class="form-group">
                    <button type="submit" class="button btn-block button-accent"><?= Yii::t('frontend','Search') ?></button>
                </div>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>


