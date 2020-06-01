<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\UniversityProgramsSearch */
/* @var $form yii\widgets\ActiveForm */
/*
?>



<div class="search-form after-jumbotron">
    <div class="container">
        <div class="text-white">
            <h2><?= Yii::t('frontend','Are you interested in studying abroad?') ?></h2>

            <h5><?= Yii::t('frontend','Find, Review and Apply to the best universities in the world') ?></h5>
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
                    <input type="text" class="form-control" placeholder="<?= Yii::t('frontend','Search') ?> " name="UniversityProgramsSearch[university_title]">
                </div>
            </div>
            <div class="form-group-row">
                <div class="form-group">
                        <?= $form->field($model, 'degree_id')->widget(\kartik\widgets\Select2::classname(), [
                            'data' => \yii\helpers\ArrayHelper::map(\backend\models\UniversityProgramDegree::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
                            'options' => ['placeholder' => Yii::t('frontend', 'Degree Level')],
                            'pluginOptions' => [
                                'allowClear' => true,
                                'class'=>'select-wrapper'
                            ],
                        ])->label(false); ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'field_id')->widget(\kartik\widgets\Select2::classname(), [
                        'data' => \yii\helpers\ArrayHelper::map(\backend\models\UniversityProgramField::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
                        'options' => ['placeholder' => Yii::t('frontend', 'Field')],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'class'=>'select-wrapper'
                        ],
                    ])->label(false); ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'major_id')->widget(\kartik\widgets\Select2::classname(), [
                        'data' => \yii\helpers\ArrayHelper::map(\backend\models\UniversityProgramMajors::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
                        'options' => ['placeholder' => Yii::t('frontend', 'Major')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label(false); ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'country_id')->widget(\kartik\widgets\Select2::classname(), [
                        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Country::find()->where(['status'=>1])->orderBy('id')->asArray()->all(), 'id', 'title'),
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

<?php */ ?>
