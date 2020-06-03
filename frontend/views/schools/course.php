<?php
use \common\models\User;
use backend\models\SchoolCourse;
?>
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/university/<?= $schoolObj->slug?>"><?= $schoolObj->title ?></a></li>
        </ol>
    </div>
</nav>


<section class="section">
    <div class="container">
        <div class="row">

            <div class="container">
                <h3 class="text-primary"><?= $schoolObj->title ?>: <?= $courseObj->title ?> <span>(<?=  SchoolCourse::ListLevels()[$courseObj->required_level] ?>)</span></h3>
                <h5>
                    <div class="rating fr">
                        <div class="jq_rating jq-stars" data-options='{"initialRating":<?= $schoolObj->total_rating?:1 ?>, "readOnly":true, "starSize":19}'></div>
                        <span class="text-muted">(<?= $schoolObj->no_of_ratings?:1 ?>)</span>
                    </div>
                    <div class="item-location text-muted"><img src="<?= $schoolObj->country->flag ?>" alt="" width="16px" height="12px">
                        <?= $schoolObj->country->title .' - '.$schoolObj->state->title .' - '. $schoolObj->city->title  ?>
                    </div>
                </h5>
                <div class="mtlg">
                    <?= $schoolObj->details ?>
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
                        <a href="/dashboard/requests/<?= $courseObj->slug ?>" class="button button-wide button-primary"><?= Yii::t('frontend','Apply Now') ?></a>
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

    <section class="section">
        <div class="container">

            <h3 class="text-primary"><i class="far fa-user"></i> Student Information</h3>

            <div class="ptxlg pbxlg plxlg prxlg bg-white shadow-sm mtmd">
                <form action="" method="">

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="firstName" class="label-control">First Name</label>
                                <input type="text" class="form-control" name="" placeholder="write first name" id="firstName">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="lastName" class="label-control">Last Name</label>
                                <input type="text" class="form-control" name="" placeholder="write last name" id="lastName">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="gender" class="label-control">Gendr</label>
                                <div class="select-wrapper">
                                    <select name="" id="gender" class="form-control">
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
                                <input type="email" class="form-control" name="" placeholder="write your email" id="email">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="mobile" class="label-control">Mobile Number</label>
                                <input type="text" class="form-control" name="" placeholder="write your mobile number" id="mobile">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="country" class="label-control">Country</label>
                                <div class="select-wrapper">
                                    <select name="" id="country" class="form-control">
                                        <option value="Cairo">Cairo</option>
                                        <option value="Afroia">Afroia</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mtsm">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="city" class="label-control">City</label>
                                <input type="text" class="form-control" name="" placeholder="write your city" id="city">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nationality" class="label-control">Nationality</label>
                                <input type="text" class="form-control" name="" placeholder="nationality" id="nationality">
                            </div>
                        </div>
                    </div>

                    <div class="row mtsm">
                        <div class="col-sm-3">
                            <button type="submit" class="button button-primary btn-block">Add Student</button>
                        </div>
                    </div>

                </form>
            </div>

            <div class="row ptlg pblg prlg pllg bg-white shadow-sm mtlg">
                <div class="col-sm-6">
                    <div class="text-large">Name:&nbsp;&nbsp; <span class="text-muted">Ahmed Saeed</span></div>
                    <div class="text-large">Gender:&nbsp;&nbsp; <span class="text-muted">Male</span></div>
                    <div class="text-large">Mobile Number:&nbsp;&nbsp; <span class="text-muted">+2 011 XX XXX XXX</span></div>
                    <div class="text-large">Nationality:&nbsp;&nbsp; <span class="text-muted">Egyption</span></div>
                </div>
                <div class="col-sm-6">
                    <div class="text-large">E-Mail:&nbsp;&nbsp; <span class="text-muted"><a href="mailto:mr.ahmedsaeed1@gmail.com">mr.ahmedsaeed1@gmail.com</a></span></div>
                    <div class="text-large">Country:&nbsp;&nbsp; <span class="text-muted">Egypt</span></div>
                    <div class="text-large">City:&nbsp;&nbsp; <span class="text-muted">Cairo</span></div>
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
                <h2 class="title title-sm title-black"><?= Yii::t('frontend','Course requirements') ?></h2>

            </div>

            <div class="col-sm-6 mbxlg">
                <h2 class="title title-sm title-black">.</h2>


                <?php
                if(Yii::$app->user->isGuest || (!Yii::$app->user->isGuest && User::IsRole(Yii::$app->user->id , User::ROLE_USER) ) ) {
                    ?>
                    <div class="mtlg">
                        <a href="/dashboard/requests/<?= $courseObj->slug ?>" class="button btn-block button-wide button-primary text-large"><?= Yii::t('frontend','Submit') ?></a>
                    </div>
                    <?
                }

                if(!Yii::$app->user->isGuest && (User::IsRole(Yii::$app->user->id , User::ROLE_REFERRAL_COMPANY) || User::IsRole(Yii::$app->user->id , User::ROLE_REFERRAL_PERSON) )  ) {
                ?>
                    <div class="mtlg">
                        <a href="" class="button btn-block button-wide button-primary text-large">
                            referral vues js button submit
                        </a>
                    </div>


                    <?
                }
                ?>



            </div>
        </div>


    </div>
</section>
