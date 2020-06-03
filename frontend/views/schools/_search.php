<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
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
                    <input type="text" class="form-control" placeholder="<?= Yii::t('frontend','Search') ?> " name="SchoolCourseSearch[title]">
                </div>
            </div>
            <div class="form-group-row">
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
                    <?= $form->field($model, 'time_of_course')->widget(\kartik\widgets\Select2::classname(), [
                        'data' =>SchoolCourse::ListCourseTime(),
                        'options' => ['placeholder' => Yii::t('frontend', 'Course Time')],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'class'=>'select-wrapper'
                        ],
                    ])->label(false); ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'country_id')->widget(\kartik\widgets\Select2::classname(), [
                        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Country::find()->where(['status'=>1])->orderBy('id')->all(), 'id', 'title'),
                        'options' => ['placeholder' => Yii::t('frontend', 'Country')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label(false); ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="button btn-block button-accent"><?= Yii::t('frontend','Search') ?></button>
                </div>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>


