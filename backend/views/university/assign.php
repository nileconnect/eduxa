<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
if(isset($saved)){
     $this->registerJs("$(function() {
          parent.jQuery.fancybox.getInstance().close();
           parent.location.reload();


     });
     
       ");

}
?>

<br/><br/><br/>

<div class="app-customers-items-form" style=" margin: auto;
  width: 80%;
  border: 3px solid green;
  padding: 10px;" >

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php
        $url = \yii\helpers\Url::to(['/helper/users-list-by-role']);
    // Get the initial city description
    $assignedTo = empty($model->responsible_id) ? '' : \common\models\User::findOne($model->responsible_id)->userProfile->fullName;

    echo $form->field($model, 'responsible_id')->widget(\kartik\select2\Select2::classname(), [
        'initValueText' => $assignedTo, // set the initial display text
        'options' => ['placeholder' =>Yii::t('common','Select')],
        'pluginOptions' => [
            'allowClear' => true,
            'minimumInputLength' => 1,

            'ajax' => [
                'url' => $url,
                'dataType' => 'json',
                'data' => new \yii\web\JsExpression('function(params) { return {q:params.term}; }')
            ],

        ],
    ]);



    ?>


    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('hr', 'Create') : Yii::t('hr', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>



    <?php ActiveForm::end(); ?>

</div>