<?php

use yii\helpers\Html;
use common\models\User;
use yii\widgets\DetailView;
use yii\bootstrap\ActiveForm;
use common\models\UserProfile;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->getPublicIdentity();
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<?php $form = ActiveForm::begin() ?>
<div class="tab-pane" id="tab_2-2">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <?php echo $form->field($model, 'status')->dropDownList(User::statuses()) ?>
        </div>

    </div>
    <div class="form-group row">
        <?php echo Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>

<div class="user-view">
    <?php
    if($model->userProfile->avatar_path){
        ?>
        <img src="<?= $model->userProfile->avatar?>" width="100px" height="100px">

        <?
    }

    ?>
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
            if( User::IsRole( Yii::$app->user->identity->id , User::ROLE_ADMINISTRATOR) and User::IsRole( $model->id , User::ROLE_MANAGER)): ?>
                <li>
                    <a href="#tab_3-3" data-toggle="tab" aria-expanded="false">
                        <?php echo Yii::t('common', 'Permissions') ?>
                    </a>
                </li>
            <?php endif;?>
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
                        [
                            'attribute' => 'gender',
                            'value' => function($model){
                                return UserProfile::ListGender()[$model->gender] ;
                            },
                        ],
                        [
                            'attribute' => 'mobile',
                            'visible'=>  !User::IsRole($model->id , User::ROLE_MANAGER),
                        ],
                        [
                            'attribute' => 'country_id',
                            'value' => function($model){
                                return $model->country_id ?  $model->country->title : '' ;
                            },
                            'format'=>'raw',
                            'visible'=>  !User::IsRole($model->id , User::ROLE_MANAGER) and !User::IsRole($model->id , User::ROLE_UNIVERSITY_MANAGER),

                        ],
                        [
                            'attribute' => 'state_id',
                            'value' => function($model){
                                return $model->state_id ?  $model->state->title : '' ;
                            },
                            'format'=>'raw',
                            'visible'=>  !User::IsRole($model->id , User::ROLE_MANAGER) and !User::IsRole($model->id , User::ROLE_UNIVERSITY_MANAGER),

                        ],

                        [
                            'attribute' => 'city_id',
                            'value' => function($model){
                                return $model->city_id ?  $model->city->title : '' ;
                            },
                            'format'=>'raw',
                            'visible'=>  !User::IsRole($model->id , User::ROLE_MANAGER) and !User::IsRole($model->id , User::ROLE_UNIVERSITY_MANAGER),

                        ],

                        [
                            'attribute' => 'find_us_from',
                            'value' => function($model){
                                return   \common\models\UserProfile::ListFindUs() [$model->find_us_from]  ;
                            },
                            'format'=>'raw',
                            'visible'=>  !User::IsRole($model->id , User::ROLE_MANAGER) and !User::IsRole($model->id , User::ROLE_UNIVERSITY_MANAGER),
                        ],
                        [
                            'attribute' => 'no_of_students',
                            'value' => function($model){
                                return $model->no_of_students  ;
                            },
                            'format'=>'raw',
                            'visible'=> !User::IsRole($model->id , User::ROLE_MANAGER) and !User::IsRole($model->id , User::ROLE_USER) and !User::IsRole($model->id , User::ROLE_UNIVERSITY_MANAGER),
                        ],

                        [
                            'attribute' => 'expected_no_of_students',
                            'value' => function($model){
                                return $model->expected_no_of_students  ;
                            },
                            'format'=>'raw',
                            'visible'=> !User::IsRole($model->id , User::ROLE_MANAGER) and !User::IsRole($model->id , User::ROLE_USER) and !User::IsRole($model->id , User::ROLE_UNIVERSITY_MANAGER),
                        ],
                        [
                            'attribute' => 'students_nationalities',
                            'value' => function($model){
                                return $model->students_nationalities  ;
                            },
                            'format'=>'raw',
                            'visible'=> !User::IsRole($model->id , User::ROLE_MANAGER) and !User::IsRole($model->id , User::ROLE_USER) and !User::IsRole($model->id , User::ROLE_UNIVERSITY_MANAGER),
                        ],

                        // //////////
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


                        // 
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
            
            <div class="tab-pane" id="tab_3-3">
                <?php $form = ActiveForm::begin() ?>
                <table id="w1" class="table table-striped table-bordered detail-view">
                    <tbody>
                        <tr>
                            <th>Users</th>
                            <td>
                                <input type="hidden" name="User[]" value="1"/>
                                <input type="checkbox" name="User[permission][]" value="users" <?= $model->checkPermmissionsInUpdate('users') ? 'checked': '' ?> />
                            </td>
                        </tr>
                        <tr>
                            <th>Manage Universities</th>
                            <td>
                                <input type="hidden" name="User[]" value="1"/>
                                <input type="checkbox" name="User[permission][]" value="universities" <?= $model->checkPermmissionsInUpdate('universities') ? 'checked': '' ?> />
                            </td>
                        </tr>
                        <tr>
                            <th>Manage Schools</th>
                            <td>
                                <input type="checkbox" name="User[permission][]" value="schools" <?= $model->checkPermmissionsInUpdate('schools') ? 'checked': '' ?> />
                            </td>
                        </tr>
                        <tr>
                            <th>Manage Requests</th>
                            <td>
                                <input type="checkbox" name="User[permission][]" value="requests" <?= $model->checkPermmissionsInUpdate('requests') ? 'checked': '' ?> />
                            </td>
                        </tr>
                        <tr>
                            <th>Reports</th>
                            <td>
                                <input type="checkbox" name="User[permission][]" value="reports" <?= $model->checkPermmissionsInUpdate('reports') ? 'checked': '' ?> />
                            </td>
                        </tr>
                        <tr>
                            <th>Countries</th>
                            <td>
                                <input type="checkbox" name="User[permission][]" value="countries" <?= $model->checkPermmissionsInUpdate('countries') ? 'checked': '' ?> />
                            </td>
                        </tr>
                        <tr>
                            <th>Static pages</th>
                            <td>
                                <input type="checkbox" name="User[permission][]" value="static_pages" <?= $model->checkPermmissionsInUpdate('static_pages') ? 'checked': '' ?> />
                            </td>
                        </tr>
                        <tr>
                            <th>Newsletter</th>
                            <td>
                                <input type="checkbox" name="User[permission][]" value="newsletter" <?= $model->checkPermmissionsInUpdate('newsletter') ? 'checked': '' ?> />
                            </td>
                        </tr>
                        <tr>
                            <th>Settings</th>
                            <td>
                                <input type="checkbox" name="User[permission][]" value="settings" <?= $model->checkPermmissionsInUpdate('settings') ? 'checked': '' ?> />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php ActiveForm::end() ?>
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
