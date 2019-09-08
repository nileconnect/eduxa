<div class="form-group" id="add-unversity-rating">
<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'UnversityRating',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden'=>true]],
        'user_id' => ['type' => TabularForm::INPUT_TEXT],
        'name' => ['type' => TabularForm::INPUT_TEXT],
        'comment' => ['type' => TabularForm::INPUT_TEXTAREA],
        'rating' => ['type' => TabularForm::INPUT_TEXT],
        'status' => ['type' => TabularForm::INPUT_TEXT],
        'ceated_at' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('backend', 'Delete'), 'onClick' => 'delRowUnversityRating(' . $key . '); return false;', 'id' => 'unversity-rating-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('backend', 'Add Unversity Rating'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowUnversityRating()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

