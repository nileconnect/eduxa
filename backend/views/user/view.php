<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;
/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->getPublicIdentity();
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="user-view">

    <p>
        <?php  // echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--        --><?php //echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
//                'method' => 'post',
//            ],
//        ]) ?>
    </p>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#tab_1-1" data-toggle="tab" aria-expanded="true">
                    <?php echo Yii::t('backend', 'Main Details') ?>
                </a>
            </li>
            <?php
            if( User::IsRole($model->id , User::ROLE_USER)){
                ?>

                <li>
                    <a href="#tab_4-4" data-toggle="tab" aria-expanded="false">
                        <?php echo Yii::t('backend', 'Certificates') ?>
                    </a>
                </li>

                <li>
                    <a href="#tab_5-5" data-toggle="tab" aria-expanded="false">
                        <?php echo Yii::t('backend', 'Test Results') ?>
                    </a>
                </li>
                <?
            }

            ?>

        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1-1">
                <?php echo DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        [
                            'label'=>'Name',
                            'value'=>function($model){
                                return $model->userProfile->fullName ;
                            }
                        ],
                        //'auth_key',
                        'email:email',

                        [
                            'attribute' => 'status',
                            'value' => function($model){
                                return User::statuses()[$model->status];
                            },
                            'format'=>'raw',
                        ],

                        'created_at:datetime',
                        //'updated_at:datetime',
                        'logged_at:datetime',
                    ],
                ]) ?>
                <hr/>
                <?php echo DetailView::widget([
                    'model' => $model->userProfile,
                    'attributes' => [

                        'firstname',
                        'lastname',
                        'mobile',

                        [
                            'attribute' => 'country_id',
                            'value' => function($model){
                                return $model->country_id ?  $model->country->title : '' ;
                            },
                            'format'=>'raw',
                        ],
                        [
                            'attribute' => 'state_id',
                            'value' => function($model){
                                return $model->state_id ?  $model->state->title : '' ;
                            },
                            'format'=>'raw',
                        ],

                        [
                            'attribute' => 'city_id',
                            'value' => function($model){
                                return $model->city_id ?  $model->city->title : '' ;
                            },
                            'format'=>'raw',
                        ],

                        [
                            'attribute' => 'find_us_from',
                            'value' => function($model){
                                return   \common\models\UserProfile::ListFindUs() [$model->find_us_from]  ;
                            },
                            'format'=>'raw',
                            //'visible'=>,
                        ],
// ///////////////////////////////////////////////////
                        [
                            'attribute' => 'no_of_students',
                            'value' => function($model){
                                return $model->no_of_students  ;
                            },
                            'format'=>'raw',
                            'visible'=> ! User::IsRole($model->id , User::ROLE_USER),
                        ],

                        [
                            'attribute' => 'expected_no_of_students',
                            'value' => function($model){
                                return $model->expected_no_of_students  ;
                            },
                            'format'=>'raw',
                            'visible'=> ! User::IsRole($model->id , User::ROLE_USER),
                        ],
                        [
                            'attribute' => 'students_nationalities',
                            'value' => function($model){
                                return $model->students_nationalities  ;
                            },
                            'format'=>'raw',
                            'visible'=> ! User::IsRole($model->id , User::ROLE_USER),
                        ],

// ////////////////////////////////////

                        [
                            'attribute' => 'job_title',
                            'value' => function($model){
                                return $model->job_title  ;
                            },
                            'format'=>'raw',
                            'visible'=> User::IsRole($model->id , User::ROLE_REFERRAL_COMPANY),
                        ],
                        [
                            'attribute' => 'company_name',
                            'value' => function($model){
                                return $model->company_name  ;
                            },
                            'format'=>'raw',
                            'visible'=>  User::IsRole($model->id , User::ROLE_REFERRAL_COMPANY),
                        ],

                        [
                            'attribute' => 'telephone_no',
                            'value' => function($model){
                                return $model->telephone_no  ;
                            },
                            'format'=>'raw',
                            'visible'=> User::IsRole($model->id , User::ROLE_REFERRAL_COMPANY),
                        ],


// ////////////////////////////////////

                        [
                            'label' => 'Interested in schools?',
                            'attribute' => 'interested_in_schools',
                            'value' => function($model){
                                return $model->interested_in_schools ? 'Yes': 'No'  ;
                            },
                            'format'=>'raw',
                            'visible'=>  User::IsRole($model->id , User::ROLE_USER),
                        ],
                        [
                            'label' => 'Interested in universities ?',
                            'attribute' => 'interested_in_university',
                            'value' => function($model){
                                return $model->interested_in_university? 'Yes': 'No'  ;
                            },
                            'format'=>'raw',
                            'visible'=>  User::IsRole($model->id , User::ROLE_USER),
                        ],

                        [
                            'attribute' => 'communtication_channel',
                            'value' => function($model){
                                return  \common\models\UserProfile::ListCommunicateChannels()[$model->communtication_channel]  ;
                            },
                            'format'=>'raw',
                            'visible'=>  User::IsRole($model->id , User::ROLE_USER),
                        ],


                    ],
                ]) ?>
            </div>

            <div class="tab-pane" id="tab_4-4">

                <?php
                if($model->studentCertificates){
                    foreach ($model->studentCertificates as $userCertificate) {
                        ?>
                        <div class="row mtmd bg-white pllg prlg ptlg pblg shadow-sm" style="background-color: white">

                            <div class="col-sm-6">
                                <div class="text-large">
                                    <span>Certificate : </span>
                                    <span class="text-muted"><?= $userCertificate->certificate_name?></span>
                                </div>
                                <div class="text-large">
                                    <span>Grade : </span>
                                    <span class="text-muted"><?= $userCertificate->grade?></span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="text-large">
                                    <span>Year Of Graduation :</span>
                                    <span class="text-muted"><?= $userCertificate->year?></span>
                                </div>
                                <div class="text-large">
                                    <span>University or School : </span>
                                    <span class="text-muted"><?= $userCertificate->university_or_school ?></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-large">
                                    <span>Country : </span>
                                    <span class="text-muted"><?= $userCertificate->country->title?></span>
                                </div>
                            </div>

                        </div>
                        <hr/>
                        <?
                    }
                }else{
                    ?>
                    <h2> No Certificate has been added</h2>
                    <?
                }
                ?>



            </div>

            <div class="tab-pane" id="tab_5-5">

                <?php
                if($model->studentTestResults){
                    foreach ($model->studentTestResults as $userTest) {
                        ?>
                        <div class="row " style="background-color: white">
                            <div class="col-sm-6">
                                <div class="text-large">
                                    <span>Test Name : </span>
                                    <span class="text-muted"><?= $userTest->test_name ?></span>
                                </div>
                                <div class="text-large">
                                    <span>score : </span>
                                    <span class="text-muted"><?= $userTest->score ?></span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="text-large">
                                    <span>Test Date :</span>
                                    <span class="text-muted"><?= $userTest->test_date ?></span>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <?
                    }
                }else{
                    ?>
                    <h2> No Test Results has been added</h2>
                    <?
                }
                ?>

            </div>


        </div>
    </div>






</div>
