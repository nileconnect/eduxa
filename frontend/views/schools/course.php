<?php
use \common\models\User;
use backend\models\SchoolCourse;

\frontend\assets\CourcesAsset::register($this);
?>
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/university/<?= $schoolObj->slug?>"><?= $schoolObj->title ?></a></li>
        </ol>
    </div>
</nav>

<div id="courcesApp" data-lang="<?php echo Yii::$app->language ; ?>" data-SchoolId="<?php echo $courseObj->school_id ; ?>">
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
                    <?= $courseObj->information ; ?>
                </div>
                <?php
                if(Yii::$app->user->isGuest){
                    ?>
                      
                <?
                }else if(!Yii::$app->user->isGuest && User::IsRole(Yii::$app->user->id , User::ROLE_USER) ){
                    ?>
                    
                    <?
                }
                ?>

            </div>

        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <h2 class="title title-black title-sm"><?= Yii::t('frontend' , 'Course Requirments')?></h2>

        <div class="ptlg pblg prlg pllg bg-white b-all text-large">
            <p>
                <?= $courseObj->requirments ; ?>
            </p>
        </div>
    </div>
</section>
<?php
if(!Yii::$app->user->isGuest && (User::IsRole(Yii::$app->user->id , User::ROLE_REFERRAL_COMPANY) || User::IsRole(Yii::$app->user->id , User::ROLE_REFERRAL_PERSON) )  ){
    ?>

    <section class="section">
        <div class="container">

            <h3 class="text-primary"><i class="far fa-user"></i> <?= Yii::t('frontend' , 'Student Information')?></h3>

            <div class="ptxlg pbxlg plxlg prxlg bg-white shadow-sm mtmd">
                <form action="" method="">

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="firstName" class="label-control"><?= Yii::t('frontend' , 'First Name')?></label>
                                <input type="text" class="form-control" name="" placeholder="<?= Yii::t('frontend' , 'write first name')?>" id="firstName">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="lastName" class="label-control"><?= Yii::t('frontend' , 'Last Name')?></label>
                                <input type="text" class="form-control" name="" placeholder="<?= Yii::t('frontend' , 'write last name')?>" id="lastName">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="gender" class="label-control"><?= Yii::t('frontend' , 'Gender')?></label>
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
                                <label for="email" class="label-control"><?= Yii::t('frontend' , 'Email')?></label>
                                <input type="email" class="form-control" name="" placeholder="<?= Yii::t('frontend' , 'write your email')?>" id="email">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="mobile" class="label-control"><?= Yii::t('frontend' , 'Mobile Number')?></label>
                                <input type="text" class="form-control" name="" placeholder="<?= Yii::t('frontend' , 'write your mobile number')?>" id="mobile">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="country" class="label-control"><?= Yii::t('frontend' , 'Country')?></label>
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
                                <label for="city" class="label-control"><?= Yii::t('common' , 'City')?></label>
                                <input type="text" class="form-control" name="" placeholder="<?= Yii::t('frontend' , 'write your city')?>" id="city">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nationality" class="label-control"><?= Yii::t('frontend' , 'Nationality')?></label>
                                <input type="text" class="form-control" name="" placeholder="<?= Yii::t('frontend' , 'Nationality')?>" id="nationality">
                            </div>
                        </div>
                    </div>

                    <div class="row mtsm">
                        <div class="col-sm-3">
                            <button type="submit" class="button button-primary btn-block"><?= Yii::t('frontend' , 'Add Student')?></button>
                        </div>
                    </div>

                </form>
            </div>

            <div class="row ptlg pblg prlg pllg bg-white shadow-sm mtlg">
                <div class="col-sm-6">
                    <div class="text-large"><?= Yii::t('frontend' , 'Name')?>:&nbsp;&nbsp; <span class="text-muted">Ahmed Saeed</span></div>
                    <div class="text-large"><?= Yii::t('frontend' , 'Gender')?>:&nbsp;&nbsp; <span class="text-muted">Male</span></div>
                    <div class="text-large"><?= Yii::t('frontend' , 'Mobile Number')?>:&nbsp;&nbsp; <span class="text-muted">+2 011 XX XXX XXX</span></div>
                    <div class="text-large"><?= Yii::t('frontend' , 'Nationality')?>:&nbsp;&nbsp; <span class="text-muted">Egyption</span></div>
                </div>
                <div class="col-sm-6">
                    <div class="text-large"><?= Yii::t('frontend' , 'Email')?>:&nbsp;&nbsp; <span class="text-muted"><a href="mailto:mr.ahmedsaeed1@gmail.com">mr.ahmedsaeed1@gmail.com</a></span></div>
                    <div class="text-large"><?= Yii::t('frontend' , 'Country')?>:&nbsp;&nbsp; <span class="text-muted">Egypt</span></div>
                    <div class="text-large"><?= Yii::t('common' , 'City')?>:&nbsp;&nbsp; <span class="text-muted">Cairo</span></div>
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
            <div class="col-sm-6 ">

                <table class="table wide-cell text-large bg-white shadow-sm plmd prmd pbmd b-all">
                    <tbody>
                        <tr>
                            <td><?= Yii::t('frontend' , 'Minimum age')?></td>
                            <td><span class="text-primary"><?= $courseObj->min_age; ?> Years</span></td>
                        </tr>
                        <tr>
                            <td><?= Yii::t('frontend' , 'Maximum Age')?></td>
                            <td><span class="text-primary">250 Meters Away</span></td>
                        </tr>
                        <tr>
                            <td><?= Yii::t('frontend' , 'Required Level')?></td>
                            <td>
                                <div class="text-primary"><?=  SchoolCourse::ListLevels()[$courseObj->required_level] ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td><?= Yii::t('frontend' , 'Time Of Course')?></td>
                            <td>
                                <div class="text-primary"><?= SchoolCourse::ListCourseTime()[$courseObj->time_of_course] ?></div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td><?= Yii::t('frontend' , 'Lessons/Week')?></td>
                            <td><span class="text-primary"><?= $courseObj->lessons_per_week; ?> </span></td>

                        </tr>
                        <tr>
                            <td><?= Yii::t('frontend' , 'Lesson Duration')?></td>
                            <td><span class="text-primary"><?= $courseObj->lesson_duration; ?></span></td>
                        </tr>
                        <tr>
                            <td><?= Yii::t('frontend' , 'Max No Of Students Per Class')?></td>
                            <td><span class="text-primary"><?= $courseObj->min_no_of_students_per_class; ?></span></td>
                        </tr>
                        <tr>
                            <td><?= Yii::t('frontend' , 'Avg No Of Students Per Class')?></td>
                            <td><span class="text-primary"><?= $courseObj->avg_no_of_students_per_class; ?></span></td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="bg-white shadow-sm b-all mtmd">
                    <div class="pllg prlg pblg ptlg">
                        <div class="select-wrapper">
                            <select name="" id="" class="form-control" v-on:change="selectAccommodation($event)">
                                <option>Accommodation options</option>

                                <option v-for="(acco,$index) in accomodtion" :value="$index" >{{acco.title}}</option>
                                
                            </select>
                        </div>
                        
                    </div>
                    <table class="table text-large wide-cell" id="accoTable" style="">
                        <tbody>
                            <tr>
                                <td><?= Yii::t('frontend' , 'Accommodation Registration Fees')?></td>
                                <td><span class="text-primary">Standard</span></td>
                            </tr>
                            <tr>
                                <td><?= Yii::t('frontend' , 'Facilities')?></td>
                                <td><span class="text-primary">Standard</span></td>
                            </tr>
                            <tr>
                                <td><?= Yii::t('frontend' , 'Room Category')?></td>
                                <td><span class="text-primary">26 Years</span></td>
                            </tr>
                            <tr>
                                <td><?= Yii::t('frontend' , 'Special diet')?></td>
                                <td><span class="text-primary">250 Meters Away</span></td>
                            </tr>
                            <tr>
                                <td><?= Yii::t('frontend' , 'Booking Cycle')?></td>
                                <td><span class="text-primary">250 Meters Away</span></td>
                            </tr>
                            <tr>
                                <td><?= Yii::t('frontend' , 'Minimum Booking duration')?></td>
                                <td><span class="text-primary">250 Meters Away</span></td>
                            </tr>
                            
                            <tr>
                                <td><?= Yii::t('frontend' , 'Distance from school (Minutes)')?></td>
                                <td><span class="text-primary">250 Meters Away</span></td>
                            </tr>
                            <tr>
                                <td><?= Yii::t('frontend' , 'Cost per Duration')?></td>
                                <td><span class="text-primary">250 Meters Away</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="col-sm-6">
                <table class="table wide-cell text-large bg-white shadow-sm plmd prmd pbmd b-all">
                    <tbody>
                        
                        <tr>
                            <td>
                                <div class="select-wrapper">
                                    <select name="" id="" class="form-control">
                                        <option>Start Date</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </td>
                            <td><span class="text-primary">50 USD</span></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="select-wrapper">
                                    <select name="" id="" class="form-control">
                                        <option>Course Duration</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </td>
                            <td><span class="text-primary">50 USD</span></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="select-wrapper">
                                    <select name="" id="" class="form-control">
                                        <option>Airport pickup</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </td>
                            <td><span class="text-primary">50 USD</span></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="select-wrapper">
                                    <select name="" id="" class="form-control">
                                        <option>Health Insurence</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </td>
                            <td><span class="text-primary">50 USD</span></td>
                        </tr>

                        <tr>
                            <td><?= Yii::t('frontend' , 'Registeration fees')?></td>
                            <td><span class="text-primary"><?= $courseObj->registeration_fees; ?> <?= $schoolObj->currency->currency_code?></span></td>
                        </tr>
                        <tr>
                            <td><?= Yii::t('frontend' , 'Study books fees')?></td>
                            <td><span class="text-primary"><?= $courseObj->study_books_fees; ?> <?= $schoolObj->currency->currency_code?></span></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" class="bg-primary text-center"><h3><?= Yii::t('frontend' , 'Total')?>: 240 <?= $schoolObj->currency->currency_code?></h3></td>

                        </tr>
                    </tfoot>
                </table>

                <div class="mtlg">
                    <a href="#" class="button button-primary btn-block text-large"><?= Yii::t('frontend' , 'Apply Now')?></a>
                </div>
            </div>
        </div>

    </div>
</section>
<section class="section">
    <div class="container">
        <h2 class="title text-center"><?= Yii::t('frontend' , 'Other courses in Language Academy')?> </h2>

        <div class="universities universities-row">

            <div class="item">
                <header class="item-header">
                    <figure>
                        <span class="cut-off">15%</span>
                        <img src="img/destinations/1.jpg" alt="">
                    </figure>
                    <div class="item-content">
                        <div class="item-name">
                            <span>Language Academy - General English</span>
                            <div class="rating">
                                
                                <span class="text-muted">(628)</span>
                            </div>
                        </div>
                        <div class="item-location"><img src="img/flags/fr.png" alt=""> Auburn - Alabama - USA</div>
                        <div class="item-body">
                            Living in today’s metropolitan world of cellular phones, mobile computers and other high-tech gadgets is not just hectic but very impersonal. We make money and then invest our time and effort in making more money. 
                        </div>
                    </div>
                </header>
                <footer class="item-footer">
                    <div>
                        <div class="item-label"><?= Yii::t('frontend' , 'Hours/week')?></div>
                        <div>22 hrs</div>
                    </div>
                    <div>
                        <div class="item-label"><?= Yii::t('frontend' , 'Study Time')?></div>
                        <div>Morning</div>
                    </div>
                    <div>
                        <div class="item-label"><?= Yii::t('frontend' , 'Best price')?></div>
                        <div><span class="original-price">150</span><span class="sale-on">27.00</span> <span class="currency"><?= $schoolObj->currency->currency_code?></span></div>
                    <div><span class="converted-price">2500</span> <span class="sale-on">27.00</span> <span class="currency">LE</span></div>
                    </div>
                    <div>
                        <a href="#" class="button btn-block button-primary"><?= Yii::t('frontend' , 'Additional Info')?></a>
                    </div>
                </footer>
            </div>

            

        </div>

    </div>
</section>

</div>

