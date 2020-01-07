<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use backend\models\Schools;

/* @var $this yii\web\View */
/* @var $model backend\models\Schools */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Schools'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schools-view">

    <div class="row">
        <div class="col-sm-9">
        </div>
        <div class="col-sm-3" style="margin-top: 15px">

            <?= Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <? /*= Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])*/
            ?>
        </div>
    </div>

    <div class="row">
<?php
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
            'attribute'=>'logo',
            'displayOnly'=>true,
            'value'=>
                "<img style='max-height:50px;' src='".$model->image_base_url.$model->image_path ."' width='120' /> <a href='download?file=$model->image_path' style='
                                                    background: #03A9F4;
                                                    max-height:50px;
                                                    padding: 13px;
                                                    margin-right: 30px;
                                                    border-radius: 100px;
                                                    width: 40px;
                                                    height: 40px;
                                                    display: inline-block;
                                                    color: white;
                                                    line-height: 10px;> 
                                                    <i style='color:white !important; ' class='fa fa-download'></i>
                                                </a> "
            ,
            'format'=>'raw',
            'visible'=> $model->logo ? true:false  ,

            'valueColOptions'=>['style'=>'width:30%;background: #87b1d11a;text-align:center;border-radius:10px;']
        ],
        'title',
        [
            'attribute'=> 'country_id',
            'format'=>'raw',
            'value'=>function($data){
                return $data->country_id ? $data->country->title : " ";
            }
        ],

        [
            'attribute'=> 'city_id',
            'format'=>'raw',
            'value'=>function($data){
              return  $data->city_id ?  $data->city->title : '' ;
            }
        ],

        'status:boolean',

        'total_rating',
        'no_of_ratings',

        'details:ntext',
        'featured:boolean',

        'accomodation_fees',
        'registeration_fees',


    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>

    <div class="row">
        <?php
        if($providerSchoolAirportPickup->totalCount){
            $gridColumnSchoolAirportPickup = [
                ['class' => 'yii\grid\SerialColumn'],
                ['attribute' => 'id', 'visible' => false],
                'title',
                [
                    'attribute'=> 'service_type',
                    'format'=>'raw',
                    'value'=>function($data){
                        return  Schools::LisAirportWay()[$data->service_type];
                    }
                ],
                'cost',
            ];
            echo Gridview::widget([
                'dataProvider' => $providerSchoolAirportPickup,
                'pjax' => true,
                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-school-airport-pickup']],
                'panel' => [
                    'type' => GridView::TYPE_PRIMARY,
                    'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('backend', 'School Airport Pickup')),
                ],
                'export' => false,
                'columns' => $gridColumnSchoolAirportPickup
            ]);
        }
        ?>

    </div>

<!--    <div class="row">-->
<!--        --><?php
//        if($providerSchoolCourse->totalCount){
//            $gridColumnSchoolCourse = [
//                ['class' => 'yii\grid\SerialColumn'],
//                ['attribute' => 'id', 'visible' => false],
//                'title',
//                'information:ntext',
//                'requirments:ntext',
//                'course_start_every',
//                'lessons_per_week',
//                'hours_per_week',
//                'min_no_of_students_per_class',
//                'avg_no_of_students_per_class',
//                'min_age',
//                'required_level',
//                'time_of_course:datetime',
//                'registeration_fees',
//                'cost_per_week',
//                'no_of_weeks',
//                'discount',
//                'required_attendance_duraion',
//            ];
//            echo Gridview::widget([
//                'dataProvider' => $providerSchoolCourse,
//                'pjax' => true,
//                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-school-course']],
//                'panel' => [
//                    'type' => GridView::TYPE_PRIMARY,
//                    'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('backend', 'School Course')),
//                ],
//                'export' => false,
//                'columns' => $gridColumnSchoolCourse
//            ]);
//        }
//        ?>
<!---->
<!--    </div>-->
<!---->


    <div class="row">

        <?php
        if($providerSchoolAccomodation->totalCount){
            $gridColumnSchoolAccomodation = [
                ['class' => 'yii\grid\SerialColumn'],
                ['attribute' => 'id', 'visible' => false],
                'title',
                'room_size',
                [
                    'attribute'=> 'booking_cycle',
                    'format'=>'raw',
                    'value'=>function($data){
                        return  Schools::LisBookingCycle()[$data->booking_cycle];
                    }
                ],
                'min_booking_duraion',
                'min_age',
                'max_age',
                'distance_from_school',
                'cost_per_duration_unit',
            ];
            echo Gridview::widget([
                'dataProvider' => $providerSchoolAccomodation,
                'pjax' => true,
                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-school-accomodation']],
                'panel' => [
                    'type' => GridView::TYPE_PRIMARY,
                    'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('backend', 'School Accomodation')),
                ],
                'export' => false,
                'columns' => $gridColumnSchoolAccomodation
            ]);
        }
        ?>

    </div>

    <div class="row">
        <?php
        if($providerSchoolRating->totalCount){
            $gridColumnSchoolRating = [
                ['class' => 'yii\grid\SerialColumn'],
                ['attribute' => 'id', 'visible' => false],
               // 'user_id',
                'name',
                'comment:ntext',
                'rating',
                'status:boolean',
            ];
            echo Gridview::widget([
                'dataProvider' => $providerSchoolRating,
                'pjax' => true,
                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-school-rating']],
                'panel' => [
                    'type' => GridView::TYPE_PRIMARY,
                    'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('backend', 'School Rating')),
                ],
                'export' => false,
                'columns' => $gridColumnSchoolRating
            ]);
        }
        ?>

    </div>



    <div class="row">
    <?php
    if($providerSchoolVideos->totalCount){
        $gridColumnSchoolVideos = [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
           // 'path',
            'base_url:url',
//            'type',
//            'size',
            'name',
            //'order',
        ];
        echo Gridview::widget([
            'dataProvider' => $providerSchoolVideos,
            'pjax' => true,
            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-school-videos']],
            'panel' => [
                'type' => GridView::TYPE_PRIMARY,
                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('backend', 'School Videos')),
            ],
            'export' => false,
            'columns' => $gridColumnSchoolVideos
        ]);
    }
    ?>

</div>

</div>
