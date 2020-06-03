<?php
use \common\models\User;


\frontend\assets\ProgramAsset::register($this);

?>
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/university/<?= $universityObj->slug?>"><?= $universityObj->title ?></a></li>
        </ol>
    </div>
</nav>

<div id="ReferalProgApp">
<section class="section">
    <div class="container">
        <div class="row">

            <div class="container">
                <h3 class="text-primary"><?= $universityObj->title ?>: <?= $programObj->title ?> <span>(<?= $programObj->major->title ?>)</span></h3>
                <h5>
                    <div class="rating fr">
                        <div class="jq_rating jq-stars" data-options='{"initialRating":4.8, "readOnly":true, "starSize":19}'></div>
                        <span class="text-muted">(628)</span>
                    </div>
                    <div class="item-location text-muted"><img src="<?= $universityObj->country->flag ?>" alt="" width="16px" height="12px">
                        <?= $universityObj->country->title .' - '.$universityObj->state->title .' - '. $universityObj->city->title  ?>
                    </div>
                </h5>
                <div class="mtlg">
                    <?= $universityObj->description ?>
                </div>
                <?php
                if(Yii::$app->user->isGuest){
                    ?>
                      <div class="mtxlg">
                        <a href="/login" class="button button-wide button-primary"><?= Yii::t('frontend','Apply Now') ?></a>
                    </div>
                <?
                }else if(!Yii::$app->user->isGuest && User::IsRole(Yii::$app->user->id , User::ROLE_USER) ){
                    ?>
                    <div class="mtxlg">
                        <a href="/dashboard/requests/<?= $programObj->slug ?>" class="button button-wide button-primary"><?= Yii::t('frontend','Apply Now') ?></a>
                    </div>

                    <?
                }
                ?>

            </div>

        </div>
    </div>
</section>
<?php
if(!Yii::$app->user->isGuest && (User::IsRole(Yii::$app->user->id , User::ROLE_REFERRAL_COMPANY) || User::IsRole(Yii::$app->user->id , User::ROLE_REFERRAL_PERSON) )  ){
    ?>

    <section class="section" >
        <div class="container">

            <h3 class="text-primary"><i class="far fa-user"></i> Student Information</h3>

            <div class="ptxlg pbxlg plxlg prxlg bg-white shadow-sm mtmd">
                
                <div id="FormAlert" class="alert" style="display:none">
                </div>

                <form id="studentForm">


                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="firstName" class="label-control">First Name</label>
                            <input type="text" class="form-control" name="" placeholder="write first name" id="firstName" v-model="firstName">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="lastName" class="label-control">Last Name</label>
                            <input type="text" class="form-control" name="" placeholder="write last name" id="lastName" v-model="lastName">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="gender" class="label-control">Gendr</label>
                            <div class="select-wrapper">
                                <select name="" id="gender" class="form-control"  v-model="gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mtsm">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="email" class="label-control">Email</label>
                            <input type="email" class="form-control" name="" placeholder="write your email" id="email"  v-model="email">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="mobile" class="label-control">Mobile Number</label>
                            <input type="text" class="form-control" name="" placeholder="write your mobile number" id="mobile"  v-model="mobile">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="country" class="label-control">Country</label>
                            <v-select v-model="selectedCountry"  label="title" :options="Countries" @input="SelectCountry"
                            >
                            </v-select>
                        </div>
                    </div>
                </div>

                <div class="row mtsm">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="city" class="label-control">City</label>
                            <v-select v-model="selectedCity"  label="title" :options="Cities" @input="SelectCity"
                            >
                            </v-select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="city" class="label-control">State</label>
                            <v-select v-model="selectedState"  label="title" :options="States" @input="SelectState"
                            >
                            </v-select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nationality" class="label-control">Nationality</label>
                            <input type="text" class="form-control" name="" placeholder="nationality" id="nationality"  v-model="nationality">
                        </div>
                    </div>
                </div>

                <div class="row mtsm">
                    <div class="col-sm-3">
                        <a href="javascript:void(0)" class="button button-primary btn-block" @click="addStudent()">Add Student</a>
                    </div>
                </div>
                </form>

                
            </div>

       

            <div class="row ptlg pblg prlg pllg bg-white shadow-sm mtlg" v-for="stud in StudentsList">
                <div class="col-sm-6">
                    <div class="text-large">Name:&nbsp;&nbsp; <span class="text-muted">{{stud.firstName}} {{stud.lastName}}</span></div>
                    <div class="text-large">Gender:&nbsp;&nbsp; <span class="text-muted">{{stud.gender}}</span></div>
                    <div class="text-large">Mobile Number:&nbsp;&nbsp; <span class="text-muted">{{stud.mobile}}</span></div>
                    <div class="text-large">Nationality:&nbsp;&nbsp; <span class="text-muted">{{stud.nationality}}</span></div>
                </div>
                <div class="col-sm-6">
                    <div class="text-large">E-Mail:&nbsp;&nbsp; <span class="text-muted"><a href="mailto:mr.ahmedsaeed1@gmail.com">{{stud.email}}</a></span></div>
                    <div class="text-large">Country:&nbsp;&nbsp; <span class="text-muted">{{stud.countryTitle}}</span></div>
                    <div class="text-large">City:&nbsp;&nbsp; <span class="text-muted">{{stud.cityTitle}}</span></div>
                    <div class="text-large">State:&nbsp;&nbsp; <span class="text-muted">{{stud.stateTitle}}</span></div>
                </div>
            </div>

        </div>
    </section>

    <?php
}

?>



<section class="section">
    <div class="container">

        <div class="row">
            <div class="col-sm-6 mbxlg">
                <h2 class="title title-sm title-black"><?= Yii::t('frontend','Program requirements') ?></h2>
                <table class="table wide-cell text-large bg-white b-all shadow-sm">
                    <tbody>
                    <tr>
                        <td><?= Yii::t('frontend','Degree') ?></td>
                        <td><span class="text-primary"><?= $programObj->degree->title ?></span></td>
                    </tr>
                    <tr>
                        <td><?= Yii::t('frontend','Program Name') ?></td>
                        <td><span class="text-primary"><?= $programObj->title ?></span></td>
                    </tr>
                    <tr>
                        <td><?= Yii::t('frontend','University') ?></td>
                        <td><span class="text-primary"><?= $universityObj->title ?></span></td>
                    </tr>

                    <?php
                    if($programObj->first_submission_date_active){
                        ?>
                        <tr>
                            <td><?= Yii::t('frontend','First Submission date') ?></td>
                            <td>
                                <div><span class="text-primary"><?= $programObj->first_submission_date?></span></div>
                            </td>
                        </tr>
                        <?
                    }
                    ?>
                    <?php
                    if($programObj->last_submission_date){
                        ?>
                        <tr>
                            <td><?= Yii::t('frontend','Last date for application') ?></td>
                            <td>
                                <div><span class="text-primary"><?= $programObj->last_submission_date?></span></div>
                            </td>
                        </tr>
                        <?
                    }
                    ?>
                   <?php
                   echo $this->render('_programstartdates', ['programStartDates' => $programStartDates]);

                   ?>



                    <tr>
                        <td><?= Yii::t('frontend','Study method') ?></td>
                        <td><span class="text-primary"><?= $programObj->methodOfStudy->title?></span></td>
                    </tr>
                    <tr>
                        <td><?= Yii::t('frontend','Program format') ?></td>
                        <td><span class="text-primary"><?= $programObj->formatOfProg->title?></span></td>
                    </tr>
                    <tr>
                        <td><?= Yii::t('frontend','Annual cost') ?></td>
                        <td><span class="text-primary"><?= $programObj->annual_cost?> <span><?= $universityObj->currency->currency_code?></span></span></td>
                    </tr>
                    <tr>
                        <td><?= Yii::t('frontend','Conditional admission') ?></td>
                        <td><span class="text-primary"><?= $programObj->conditionalAdm->title ?></span></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-sm-6 mbxlg">
                <h2 class="title title-sm title-black">.</h2>
                <table class="table bg-white b-all shadow-sm">
                    <tr>
                        <td><?= Yii::t('frontend','Study duration') ?></td>
                        <td><span class="text-primary"><?= $programObj->study_duration_no ?> </span><span><?= \backend\models\University::listPeriods()[$programObj->study_duration] ?></span></td>
                    </tr>
                    <tr>
                        <td><?= Yii::t('frontend','Study language') ?></td>
                        <td><span class="text-primary"><?= $programObj->studyLang->title ; ?></span></td>
                    </tr>
                    <tr>
                        <td>TOEFL</td>
                        <td><span class="text-primary"><?=  $programObj->toefl?></span></td>
                    </tr>
                    <tr>
                        <td>IELTS</td>
                        <td><span class="text-primary"><?=  $programObj->progIelts->title ?></span></td>
                    </tr>
                    <tr>
                        <td><?= Yii::t('frontend','Bank statment') ?></td>
                        <td><span class="text-primary"><?= $programObj->bank_statment?>  <?= $universityObj->currency->currency_code ?></span></td>
                    </tr>
                    <tr>
                        <td><?= Yii::t('frontend','High school transcript') ?></td>
                        <td><span class="text-primary"><?= $programObj->high_school_transcript ?></td>
                    </tr>
                    <tr>
                        <td><?= Yii::t('frontend','Bachelor degree certificate') ?></td>
                        <td><span class="text-primary"><?= $programObj->bachelor_degree ?></span></td>
                    </tr>
                    <tr>
                        <td><?= Yii::t('frontend','Note 1') ?></td>
                        <td><span class="text-primary"><?= $programObj->note1 ?></span></td>
                    </tr>
                    <tr>
                        <td><?= Yii::t('frontend','Note 2') ?></td>
                        <td><span class="text-primary"><?= $programObj->note1 ?> </span></td>
                    </tr>
                </table>

                <?php
                if(Yii::$app->user->isGuest || (!Yii::$app->user->isGuest && User::IsRole(Yii::$app->user->id , User::ROLE_USER) ) ) {
                    ?>
                    <div class="mtlg">
                        <a href="/dashboard/requests/<?= $programObj->slug ?>" class="button btn-block button-wide button-primary text-large"><?= Yii::t('frontend','Submit') ?></a>
                    </div>
                    <?
                }

                if(!Yii::$app->user->isGuest && (User::IsRole(Yii::$app->user->id , User::ROLE_REFERRAL_COMPANY) || User::IsRole(Yii::$app->user->id , User::ROLE_REFERRAL_PERSON) )  ) {
                ?>
                    <div class="mtlg">
                        <a href="javascript:void(0)" class="button btn-block button-wide button-primary text-large" @click="submitReferal()">
                            referral submit
                        </a>
                    </div>


                    <?
                }
                ?>



            </div>
        </div>


    </div>
</section>

</div>
