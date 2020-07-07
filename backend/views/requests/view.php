<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Requests */

$this->title = 'Request No: '.$model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Requests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requests-view">
    <?php $form = \yii\bootstrap\ActiveForm::begin(); ?>

    <div class="text-center">
            <div class="col-md-3">
                <?= $form->field($model, 'status')->dropDownList(\backend\models\Requests::ListStatus()) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'admin_notes')->textarea(['rows' => 6]) ?>
            </div>
        <div class="col-md-6">
              <div class="form-group">
                    <?= Html::submitButton('Save Changes', ['class' => 'btn btn-primary']) ?>
                </div>
        </div>
    </div>
    <?php \yii\bootstrap\ActiveForm::end(); ?>
    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],

        [
            'attribute' => 'status',
            'value' => function($model){
                return  \backend\models\Requests::ListStatus()[$model->status];
            },

        ],

        [
            'attribute' => 'model_name',
            'value' => function($model){
                return  $model->modelObj->title;
            },

        ],

        [
            'attribute' => 'model_parent_id',
            'value' => function($model){
                return   $model->modelParentObj->title;
            },

        ],
        [
            'attribute' => 'request_by_role',
            'value' => function($model){
                return \backend\models\Requests::ListRequestBy()[$model->request_by_role];
            },
        ],

        [
            'attribute' => 'requester.username',
            'label' => Yii::t('backend', 'Requester'),
        ],
        'request_notes:ntext',
        'admin_notes:ntext',
        'student_first_name',
        'student_last_name',
        [
            'attribute'=>'student_gender',
            'value'=>function($model){
                return  \common\models\UserProfile::ListGender()[$model->student_gender];
            },
            'format'=>'raw'
        ],
        'student_email:email',
        'student_mobile',
        [
            'attribute' => 'studentCountry.title',
            'label' => Yii::t('backend', 'Student Country'),
        ],
        [
            'attribute' => 'studentCity.title',
            'label' => Yii::t('backend', 'Student State'),
        ],
        [
            'attribute' => 'studentNationality.title',
            'label' => Yii::t('backend', 'Student Nationality'),
        ],

        [
            'attribute' => 'accomodation_option',
            'visible'=> $model->model_name == 0,
        ],

        [
            'attribute' => 'accomodation_option_cost',
            'visible'=> $model->model_name == 0,
        ],

        [
            'attribute' => 'airport_pickup',
            'visible'=> $model->model_name == 0,
        ],

        [
            'attribute' => 'airport_pickup_cost',
            'visible'=> $model->model_name == 0,
        ],

        [
            'attribute' => 'course_start_date',
            'visible'=> $model->model_name == 0,
        ],

        [
            'attribute' => 'number_of_weeks.title',
            'visible'=> $model->model_name == 0,
        ],

    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>

</div>
