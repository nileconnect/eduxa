<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use trntv\filekit\widget\Upload;
use yii\web\JsExpression;
use kartik\depdrop\DepDrop;
use \common\helpers\multiLang\MyMultiLanguageActiveField;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Schools */
/* @var $form yii\widgets\ActiveForm */
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'SchoolRating',
        'relID' => 'school-rating',
        'value' => \yii\helpers\Json::encode($model->schoolRatings),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);


\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'SchoolAccomodation',
        'relID' => 'school-accomodation',
        'value' => \yii\helpers\Json::encode($model->schoolAccomodations),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'SchoolAirportPickup',
        'relID' => 'school-airport-pickup',
        'value' => \yii\helpers\Json::encode($model->schoolAirportPickups),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);

?>

<div class="schools-form">
    <?php
    $this->beginContent('@app/views/public/multi-lang.php');
    $this->endContent();
    ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <div class="row">
        <div class="col-md-4">
            <div class="well" style="height: 143px;">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title'])->widget(MyMultiLanguageActiveField::className());  ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="well" style="height: 143px;">
                <?= $form->field($model, 'status')->dropDownList([\backend\models\University::LisStatusList()])?>

            </div>
        </div>
        <div class="col-md-4">
            <div class="well" style="height: 143px;">
                <?= $form->field($model, 'featured')->checkbox() ; ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="well">
                <?= $form->field($model, 'country_id')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Country::find()->where(['status'=>1])->orderBy('id')->asArray()->all(), 'id', 'title'),
                    'options' => ['placeholder' => Yii::t('backend', 'Choose Country') ,'id'=>'CountryId'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
                <?php
                // Child # 1
                echo $form->field($model, 'state_id')->widget(DepDrop::classname(), [
                    'data' =>$model->country_id ?  \yii\helpers\ArrayHelper::map(\backend\models\State::find()->where(['country_id'=>$model->country_id])->asArray()->all(), 'id', 'title') : [],
                    'options'=>['id'=>'City-id'],
                    'pluginOptions'=>[
                        'depends'=>['CountryId'],
                        'placeholder'=>'Select...',
                        'url'=>Url::to(['/helper/states'])
                    ]
                ]);

                ?>

            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
                <?php
                // Child # 1
                echo $form->field($model, 'city_id')->widget(DepDrop::classname(), [
                    'data' =>$model->country_id ?  \yii\helpers\ArrayHelper::map(\backend\models\Cities::find()->where(['state_id'=>$model->state_id])->asArray()->all(), 'id', 'title') : [],
                    'options'=>['id'=>'subcat-id'],
                    'pluginOptions'=>[
                        'depends'=>['City-id'],
                        'placeholder'=>'Select...',
                        'url'=>Url::to(['/helper/cities'])
                    ]
                ]);

                ?>

            </div>
        </div>

    </div>




    <?= $form->field($model, 'details')->textarea(['maxlength' => 255, 'rows'=>3])
        ->widget(MyMultiLanguageActiveField::className(), ['inputType'=>'textArea', 'inputOptions'=>[
            'rows'=>5,
            'class'=>'form-control',
        ]]) ?>


    <?= $form->field($model, 'detailed_address')->textInput()->widget(MyMultiLanguageActiveField::className(), ['inputType'=>'text', 'inputOptions'=>[
            'class'=>'form-control',
        ]]) ?>


    <div class="row">
        <div class="col-md-4 col-sm-12">
            <?= $form->field($model, 'location')->textInput([ 'id' => 'us2-address']) ?>

        </div>

        <div class="col-md-4 col-sm-12">
            <?= $form->field($model, 'lat')->textInput([ 'id' => 'us2-lat']) ?>

        </div>

        <div class="col-md-4 col-sm-12">
            <?= $form->field($model, 'lng')->textInput([ 'id' => 'us2-lon']) ?>

        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-12">

            <?php
            echo \pigolab\locationpicker\LocationPickerWidget::widget([
                'key' => env('GOOGLE_MAP_KEY'), 	// require , Put your google map api key
                'options' => [
                    'style' => 'width: 100%; height: 400px', // map canvas width and height
                ] ,
                'clientOptions' => [
                    'location' => [
                        'latitude'  => $model->lat == ''? env('START_LAT') : $model->lat ,
                        'longitude' => $model->lng == ''? env('START_LNG') : $model->lng ,
                    ],
                    'radius'    => 300,
                    'addressFormat' => 'street_number',
                    'inputBinding' => [
                        'latitudeInput'     => new JsExpression("$('#us2-lat')"),
                        'longitudeInput'    => new JsExpression("$('#us2-lon')"),
                        'radiusInput'       => new JsExpression("$('#us2-radius')"),
                        'locationNameInput' => new JsExpression("$('#us2-address')")
                    ]
                ]
            ]);
            ?>

        </div>

        <div class="col-md-6 col-sm-12">
            <div class="col-md-6 col-sm-12">
                <?php
                $CurrencyArr = \yii\helpers\ArrayHelper::map(\backend\models\Currency::find()->where(['status'=>1])->all(), 'id', 'currency_code');
                $NextToArr = \yii\helpers\ArrayHelper::map(\backend\models\SchoolNextTo::find()->all(), 'id', 'title');
                echo $form->field($model, 'currency_id')->dropDownList($CurrencyArr, [ 'prompt' => 'Select Currency ']);
                echo $form->field($model, 'next_to')->dropDownList($NextToArr, [ 'prompt' => 'Select Next To ']);

             //   echo $form->field($model, 'has_health_insurance')->checkbox(['id' => 'insuranceIDChekc'])

                ?>
<!--                <div class="col-md-6 col-sm-12 autoUpdate" style="display: --><?//= $model->has_health_insurance? "block":"none" ?><!--">-->
<!--                    --><?//= $form->field($model, 'health_insurance_cost')->textInput(['placeholder' => 'Health Insurance Cost']) ?>
<!--                </div>-->

            </div>
        </div>
    </div>
<hr/>


<hr/>


    <?php
    $forms = [

        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('backend', 'School Accomodations')),
            'content' => $this->render('_formSchoolAccomodation', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->schoolAccomodations),
            ]),
        ],

        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('backend', 'School Airport Pickup')),
            'content' => $this->render('_formSchoolAirportPickup', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->schoolAirportPickups),
            ]),
        ],

        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('backend', 'School Rating')),
            'content' => $this->render('_formSchoolRating', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->schoolRatings),
            ]),
        ],

    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?>







    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$script = <<< JS
    $('#insuranceIDChekc').change(function(){
            if(this.checked) {
                   $('.autoUpdate').show(); 
              }else{
                 $('.autoUpdate').hide();
                 $('#schools-health_insurance_cost').val('') ;
              }
              


        });
JS;
$this->registerJs($script);
?>
