<div class="form-group" id="add-university-videos">
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

?>

    <h5 style="color: darkseagreen"><i>Please upload videos to youtube and add links here</i></h5>
    <?

echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'UniversityVideos',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden'=>true]],
       // 'path' => ['type' => TabularForm::INPUT_TEXT],
        'name' => ['type' => TabularForm::INPUT_TEXT],

        'base_url' => [
                'type' => TabularForm::INPUT_TEXT,
               'options'=>['type' => 'url' ,'placeholder'=>'https://www.youtube.com/watch?v=XXXXXX' ]//'pattern'=>'https://www.youtube.com/watch?v=
            ],
       // 'type' => ['type' => TabularForm::INPUT_TEXT],
        //'size' => ['type' => TabularForm::INPUT_TEXT],
        //'order' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('backend', 'Delete'), 'onClick' => 'delRowUniversityVideos(' . $key . '); return false;', 'id' => 'university-videos-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('backend', 'Add University Videos'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowUniversityVideos()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

