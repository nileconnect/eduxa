<?php

use backend\models\SchoolCourseSessionCost;
use \common\models\User;
use backend\models\SchoolCourse;

\frontend\assets\CourcesAsset::register($this);
$original_price = 0;
if($courseObj->discount){
    $original_price = $courseObj->minimumPrice + ($courseObj->minimumPrice * ($courseObj->discount/100) );
    $min_price = $courseObj->minimumPrice;
}else{
    $min_price = $courseObj->minimumPrice;
}
$this->title =  $schoolObj->title .' - '. $courseObj->title ;
?>

<style>
.nav-pills .nav-item .nav-link{
    border-top: 4px solid #EEEEEE;
    border-bottom:0;
}
.nav-pills {
    border-bottom: 0;
    border-top: 4px solid #EEEEEE;
}
.nav-pills .nav-item {
    position: relative;
    bottom: 0;
    top: -4px;
}
select option[data-default] {
  color: #888 !important;
}
.embed-responsive {
    position: relative;
    display: block;
    width: 100%;
    padding: 0;
    overflow: hidden;
}
</style>
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <!-- <li class="breadcrumb-item" ><a href="/university/<?= $schoolObj->slug?>"><?= $schoolObj->title ?></a></li> -->
            <li class="breadcrumb-item active" aria-current="page"><?= $schoolObj->title ?> - <?= $courseObj->title ?></li>
        </ol>
    </div>
</nav>

<div id="courcesApp" data-lang="<?php echo Yii::$app->language ; ?>" data-SchoolId="<?php echo $courseObj->school_id ; ?>" data-CourseID="<?php echo $courseObj->id; ?>" 
data-CourseSlug="<?php echo $courseObj->slug; ?>"
>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
               

                <div class="topTabs">
                   
                    <div id="myTabContent" class="tab-content">
                        <div id="tabImages" role="tabpanel" aria-labelledby="images-tab" class="tab-pane fade active show">
                            
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <?php
                                    $firstslid= 'active';
                                    foreach ($schoolObj->schoolPhotos as $schoolPhoto) {
                                        ?>
                                        <div class="carousel-item <?=$firstslid?>">
                                            <img class="d-block w-100" src="<?= $schoolPhoto->base_url.$schoolPhoto->path?>" alt="<?= $schoolObj->title ?>">
                                        </div>
                                        <?
                                        $firstslid='';
                                    }
                                    ?>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            
                        </div>
                        <div id="tabVideos" role="tabpanel" aria-labelledby="videos-tab" class="tab-pane fade">
                            <div class="row" style="margin-top:20px">

                                
                            <div id="VideoCaro" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    
                                <?php
                                    if($schoolObj->schoolVideos){
                                        $firstslid= 'active';
                                        foreach ($schoolObj->schoolVideos as $schoolVideo) {
                                            ?>
                                            
                                            <div class="carousel-item <?=$firstslid?>">
                                                <div class="embed-responsive-16by9 video-fluid">
                                                    <iframe width="445" height="300" src="https://www.youtube.com/embed/<?= MyYoutubeVideoID($schoolVideo->base_url); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                </div>
                                                
                                            </div>
                                            
                                            <?
                                             $firstslid='';
                                        }
                                    }
                                ?>



                                </div>
                                <a class="carousel-control-prev" href="#VideoCaro" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#VideoCaro" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>


                            




                                
                            </div>
                        </div>
                    </div>
                    <ul id="myTab" role="tablist" class="nav nav-pills">
                        <li class="nav-item">
                            <a id="images-tab" data-toggle="tab" href="#tabImages" role="tab" aria-controls="images" aria-selected="true" class="nav-link active"><?= Yii::t('frontend' , 'Images')?></a>
                        </li> 
                        <li class="nav-item">
                            <a id="videos-tab" data-toggle="tab" href="#tabVideos" role="tab" aria-controls="videos" aria-selected="false" class="nav-link"><?= Yii::t('frontend' , 'Videos')?></a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="col-sm-7">
                <h2 class="text-primary"><?= $schoolObj->title ?> - <?= $courseObj->title ?></h2>
                <h5>
                    <div class="rating fr">
                        <div class="jq_rating jq-stars" data-options='{"initialRating":<?= $schoolObj->total_rating ?:1; ?>, "readOnly":true, "starSize":19}'></div>
                        <span class="text-muted">(<?= $schoolObj->no_of_ratings?:1 ?>)</span>
                    </div>
                    <div class="item-location text-muted"><img src="<?= $schoolObj->country->flag ?>" alt="" width="16px" height="12px">
                        <?= $schoolObj->country->title .' - '.$schoolObj->state->title .' - '. $schoolObj->city->title  ?>
                </h5>
                <div class="mtlg">
                    <?= $schoolObj->details ?>
                </div>
                <div class="mtlg">
                    <?php if(!Yii::$app->user->isGuest) :?>
                    <a href="#applyDiv" class="button button-primary button-wide"><?= Yii::t('frontend' , 'Apply Now')?></a>
                    <?php else :?>
                        <a href="/login?return=/school/course/<?= $courseObj->slug ?>" class="button button-primary button-wide"><?= Yii::t('frontend' , 'Apply Now')?></a>
                    <?php endif;?>
                    <p class="mtsm text-large">
                    <div class="item-label"><?= Yii::t('frontend' , 'Best Weekly Price')?> :</div> 
                    <div class="bestprice">
                        <?php if($original_price):?>
                            <span class=""> 
                                <?= $min_price ?> <?= $schoolObj->currency->currency_code ?>
                            </span>
                            <span class="line-through text-red"> 
                                <?=  $original_price ?> <?= $schoolObj->currency->currency_code ?>
                            </span>
                        <?php else:?>
                            <?= $min_price ?>
                            <?= $schoolObj->currency->currency_code ?>
                        <?php endif;?>
                    </div> 
                    <div>
                        <span class="converted-price">
                            <?php
                                echo \common\helpers\MyCurrencySwitcher::checkCurrency($courseObj->school->currency->currency_code ,$min_price ,false);
                            ?>
                        </span>
                    </div>
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <h2 class="title title-black title-sm"><?= $courseObj->schoolCourseType->title?></h2>

        <div class="ptlg pblg prlg pllg bg-white b-all text-large">
            <p>
                <?= $courseObj->information ;?>
            </p>
        </div>
    </div>
</section>

<?php
if(!Yii::$app->user->isGuest && (User::IsRole(Yii::$app->user->id , User::ROLE_REFERRAL_COMPANY) || User::IsRole(Yii::$app->user->id , User::ROLE_REFERRAL_PERSON) )  ){
    ?>

    <section class="section">
        <div class="container">
            <div class="alert alert-danger" id="studentError" style="display:none">
                <p><?= Yii::t('frontend' , 'Please, Add students information.')?><p>
            </div>
            <h3 class="text-primary"><i class="far fa-user"></i> <?= Yii::t('frontend' , 'Student Info')?></h3>

            <div class="ptxlg pbxlg plxlg prxlg bg-white shadow-sm mtmd">
                
                <div id="FormAlert" class="alert" style="display:none">
                </div>

                <form id="studentForm">


                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="firstName" class="label-control"><?= Yii::t('frontend','First Name(s)')?></label>
                            <input type="text" class="form-control" name="" placeholder="<?= Yii::t('frontend','write first name')?>" id="firstName" v-model="firstName" minlength="2" maxlength="15">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="lastName" class="label-control"><?= Yii::t('frontend','Family Name')?></label>
                            <input type="text" class="form-control" name="" placeholder="<?= Yii::t('frontend','write last name')?>" id="lastName" v-model="lastName" minlength="2" maxlength="15">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="gender" class="label-control"><?= Yii::t('frontend','Gender')?></label>
                            <div class="select-wrapper">
                                <select name="" id="gender" class="form-control"  v-model="gender">
                                    <option value="" selected data-default><?= Yii::t('frontend','Gender')?></option>
                                    <option value="male"><?= Yii::t('frontend','Male')?></option>
                                    <option value="female"><?= Yii::t('frontend','Female')?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mtsm">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="email" class="label-control"><?= Yii::t('frontend','Email')?></label>
                            <input type="email" class="form-control" name="" placeholder="<?= Yii::t('frontend','write your email')?>" id="email"  v-model="email">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="mobile" class="label-control"><?= Yii::t('frontend','Mobile Number')?></label>
                            <input type="number" class="form-control" name="" placeholder="<?= Yii::t('frontend','write your mobile number')?>" id="mobile"  v-model="mobile">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="country" class="label-control"><?= Yii::t('frontend','Country')?></label>
                            <v-select v-model="selectedCountry" placeholder="<?= Yii::t('frontend','Country')?>"  label="title" :options="Countries" @input="SelectCountry"
                            >
                            </v-select>
                        </div>
                    </div>
                </div>

                <div class="row mtsm">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="city" class="label-control"><?= Yii::t('common','State')?></label>
                            <v-select id="city" v-model="selectedState"  label="title" placeholder="<?= Yii::t('frontend','State')?>" :options="States" @input="SelectState"
                            >
                            </v-select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="State" class="label-control"><?= Yii::t('common','City')?></label>
                            <v-select id="State" v-model="selectedCity"  label="title" placeholder="<?= Yii::t('frontend','City')?>" :options="Cities" @input="SelectCity"
                            >
                            </v-select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nationality" class="label-control"><?= Yii::t('frontend','Nationality')?></label>
                            <input type="text" class="form-control" name="" placeholder="<?= Yii::t('frontend','Nationality')?>" id="nationality"  v-model="nationality"  minlength="2" maxlength="15">
                        </div>
                    </div>
                </div>

                <div class="row mtsm">
                    <div class="col-sm-3">
                        <a href="javascript:void(0)" class="button button-primary btn-block" @click="addStudent()"><?= Yii::t('frontend','Add Student')?></a>
                    </div>
                </div>
                </form>

                
            </div>

       

            <div class="row ptlg pblg prlg pllg bg-white shadow-sm mtlg" style="position: relative;" v-for="(stud,index) in StudentsList">
                <div class="col-sm-6">
                    <div class="text-large"><?= Yii::t('frontend','Name')?>:&nbsp;&nbsp; <span class="text-muted">{{stud.firstName}} {{stud.lastName}}</span></div>
                    <div class="text-large"><?= Yii::t('frontend','Gender')?>:&nbsp;&nbsp; <span class="text-muted">{{stud.gender}}</span></div>
                    <div class="text-large"><?= Yii::t('frontend','Mobile Number')?>:&nbsp;&nbsp; <span class="text-muted">{{stud.mobile}}</span></div>
                    <div class="text-large"><?= Yii::t('frontend','Nationality')?>:&nbsp;&nbsp; <span class="text-muted">{{stud.nationality}}</span></div>
                </div>
                <div class="col-sm-6">
                    <div class="text-large"><?= Yii::t('frontend','Email')?>:&nbsp;&nbsp; <span class="text-muted"><a href="mailto:mr.ahmedsaeed1@gmail.com">{{stud.email}}</a></span></div>
                    <div class="text-large"><?= Yii::t('common','Country')?>:&nbsp;&nbsp; <span class="text-muted">{{stud.countryTitle}}</span></div>
                    <div class="text-large"><?= Yii::t('common','State')?>:&nbsp;&nbsp; <span class="text-muted">{{stud.stateTitle}}</span></div>

                    <div class="text-large"><?= Yii::t('common','City')?>:&nbsp;&nbsp; <span class="text-muted">{{stud.cityTitle}}</span></div>
                </div>
                <a href="javascript:void(0)" class="deleteStudent" @click="deleteStudent(index)"><i class="far fa-times-circle"></i></a>
            </div>


        </div>
    </section>

 <?php
}

?>

<section class="section" id="applyDiv">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 ">

                <table class="table wide-cell text-large bg-white shadow-sm plmd prmd pbmd b-all">
                    <tbody>
                        <tr>
                            <td><?= Yii::t('frontend' , 'Minimum age')?></td>
                            <td><span class="text-primary"><?= $courseObj->min_age; ?> <?= Yii::t('frontend','Years')?></span></td>
                        </tr>
                        <tr>
                            <td><?= Yii::t('frontend' , 'Course Start Date')?></td>
                            <td>
                                <?php
                                foreach ($courseObj->schoolCourseStartDates as $schoolStatrDate) {
                                    if(Yii::$app->language == 'ar') {
                                        $date = \common\helpers\TimeHelper::arabicDate($schoolStatrDate->course_date);
                                    }else{
                                        $date = date( "j F , Y" , strtotime($schoolStatrDate->course_date));
                                    }
                                    ?>
                                    <span class="text-primary"><?= $date; ?></span><br/>
                                    <?
                                }
                                ?>

                            </td>
                        </tr>
                        
                        <tr>
                            <td><?= Yii::t('frontend' , 'Minimum Entry Level')?></td>
                            <td>
                                <div class="text-primary"><?=  SchoolCourse::ListLevels()[$courseObj->required_level] ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td><?= Yii::t('frontend' , 'Study Time')?></td>
                            <td>
                                <div class="text-primary"><?= SchoolCourse::ListCourseTime()[$courseObj->time_of_course] ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td><?= Yii::t('frontend' , 'Max Students/Class')?></td>
                            <td><span class="text-primary"><?= $courseObj->max_no_of_students_per_class; ?></span></td>
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
                            <td><?= Yii::t('frontend' , 'Average Students/Class')?></td>
                            <td><span class="text-primary"><?= $courseObj->avg_no_of_students_per_class; ?></span></td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="bg-white shadow-sm b-all mtmd">
                    <div class="pllg prlg pblg ptlg">
                        <div class="select-wrapper" style="margin-bottom: 15px;">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btnAcco" data-toggle="modal" data-target="#AccoModal">
                            <?= Yii::t('frontend' , 'Accommodation options')?>
                            </button>
                            <i class="fas fa-times cancelAccommo" @click="cancelAccommo()" style="position: absolute;right: -18px;top: 13px;display:none"></i>

                            <!-- Modal -->
                            <div class="modal fade" id="AccoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><?= Yii::t('frontend' , 'Accommodation options available')?>:</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div v-for="acco in accomodtion">
                                                <div class="row">
                                                    <div class="col-md-12">    
                                                        <p>
                                                            {{acco.title}}
                                                            <br>
                                                            {{acco.cost_per_duration_unit}} USD {{acco.booking_cycle}}
                                                            <br>
                                                            <?= Yii::t('frontend' , 'Registeration fees')?> {{acco.reg_fees}} USD
                                                        </p>
                                                    </div>
                                                </div>
                                                <ul class="row">
                                                    <li v-if="acco.room" class="col-md-6">
                                                        <i class="fas fa-bed"></i> <?= Yii::t('frontend' , 'Room type')?>: {{acco.room}}</li>
                                                    <li v-if="acco.booking_cycle" class="col-md-6"><i class="far fa-calendar-alt"></i> <?= Yii::t('frontend' , 'Booking cycle')?>: {{acco.booking_cycle}}</li>
                                                    <li v-if="acco.facility" class="col-md-6"><i class="fas fa-bath"></i> <?= Yii::t('frontend' , 'facilities')?>: {{acco.facility}}</li>
                                                    <li v-if="acco.min_booking_duraion" class="col-md-6"><i class="far fa-calendar-check"></i> <?= Yii::t('frontend' , 'Min Booking Duration')?>: {{acco.min_booking_duraion}}</li>
                                                    <li v-if="acco.distance_from_school" class="col-md-6"><i class="far fa-clock"></i> <?= Yii::t('frontend' , 'Distance from school')?>: {{acco.distance_from_school}}</li>
                                                    <li v-if="acco.special_diet" class="col-md-6"><i class="fas fa-utensils"></i> <?= Yii::t('frontend' , 'Special diat')?>: {{acco.special_diet}}</li>
                                                </ul>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <a href="javascript:void(0)" v-on:click="selectAccommodation(acco)" style="margin-bottom:20px" class="button button-primary btn-block text-large"><?= Yii::t('frontend' , 'Choose this option')?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            

                                        </div>
                                    </div>
                                </div>
                            </div>

                           
                        </div>
                        <div class="select-wrapper">
                            <select name="" id="" class="form-control"  @change="Selectperiod($event)">
                                <option><?= Yii::t('frontend' , 'Accommodation period')?></option>

                                <option v-for="period in accoperiods" :value="period">{{period}} {{week}}</option>
                                
                            </select>
                        </div>
                        
                    </div>

                </div>

            </div>
            <div class="col-sm-6">
                <table class="table wide-cell text-large bg-white shadow-sm plmd prmd pbmd b-all">
                    <tbody>
                        <tr>
                            <td>
                                <?= Yii::t('frontend' , 'Courses')?>
                            </td>
                            <td>
                                <select name="course" class="form-control" onchange=" location.href = '/school/course/'+this.value" >
                                <?php foreach($schoolObj->schoolCourses as $schoolCourse):?>
                                    <option value="<?= $schoolCourse->slug ?>" <?php if($schoolCourse->id == $courseObj->id) echo "selected";?> > <?= $schoolCourse->title ?> </option>
                                <?php endforeach;?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="select-wrapper">
                                    <select name="" id="" class="form-control"  @change="Selectdate($event)">
                                        <option value="0"><?= Yii::t('frontend' , 'Start Date')?></option>
                                        <option v-for="date in StartDates" :value="date.id">{{date.course_date}}</option>
                                        
                                    </select>
                                    <p class="invalid-feedback selectdateerror"><?= Yii::t('frontend' , 'Select start date first')?></p>
                                </div>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                if($courseObj->cost_type == SchoolCourse::COST_PER_WEEK ){
                                    ?>
                                    <label><?= Yii::t('frontend' , 'Course Duration (weeks)')?></label>
                                    <!-- <input type="number" class="form-control" placeholder="Course Duration" @change="GetCourseDurations($event)"> -->
                                    <select class="form-control"  @change="GetCourseDurations($event)">
                                    <option><?= Yii::t('frontend' , 'Course Duration (weeks)')?></option>
                                    <?php
                                        for($i=1 ;$i<= 52 ; $i++){
                                            ?>
                                            <option value="<?= $i?>"> <?= $i?></option>
                                            <?
                                        }
                                        ?>
                                    </select>
                                    <?
                                }else{
                                    $costObj = SchoolCourseSessionCost::find()->where('school_course_id ='.$courseObj->id)->one();
                                    ?>
                                    <label><?= Yii::t('frontend' , 'Course Duration by session (each')?> <?= $costObj->weeks_per_session ?> <?= Yii::t('frontend' , 'weeks)')?></label>
                                    <select class="form-control"  @change="GetCourseDurations($event)">
                                        <option><?= Yii::t('frontend' , 'Course Duration by session')?></option>
                                        <?php
                                        for($i=$costObj->no_of_sessions ;$i<= $costObj->max_no_of_sessions ; $i++){
                                            ?>
                                            <option value="<?= $i?>"> <?= $i?></option>
                                            <?
                                        }
                                        ?>

                                    </select>
                                    <?
                                }
                                ?>





                                <p class="invalid-feedback durationerror"><?= Yii::t('frontend' , 'Select course duration first')?></p>
                            </td>
                            <td ><span class="text-primary" v-if="CourseDurations">{{CourseDurations}} <?= $schoolObj->currency->currency_code?></span></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="select-wrapper">
                                    <select name="" id="" class="form-control" @change="SelectAirport($event)">
                                        <option><?= Yii::t('frontend' , 'Airport pickup')?></option>
                                        <option v-for="(airport,$index) in airports" :value="$index">{{airport.title}} - {{airport.service_type}}</option>
                                        
                                    </select>
                                </div>
                            </td>
                            <td><span class="text-primary" v-if="SelectedAirport.cost">{{SelectedAirport.cost}} <?= $schoolObj->currency->currency_code?></span></td>
                        </tr>

                       <?php
                       if($schoolObj->has_health_insurance ){
                       ?>
                        <tr>
                            <td>
                                
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="<?= $schoolObj->health_insurance_cost ?>" id="defaultCheck1" @change="GetHealth($event)">
                                    <label class="form-check-label" for="defaultCheck1">
                                    <?= Yii::t('frontend' , 'Health Insurance')?>
                                    </label>
                                </div>
                                
                            </td>
                            <td><span class="text-primary" v-if="SelectedHealth">{{SelectedHealth}} <?= $schoolObj->currency->currency_code?></span></td>
                        </tr>
                        <? } ?>



                        <tr v-if="accomodtionFees">
                            <td><?= Yii::t('frontend' , 'Accommodation fees')?></td>
                            <td><span class="text-primary" id="accomodtionFees">{{accomodtionFees}} <?= $schoolObj->currency->currency_code?></span></td>
                        </tr>
                        <tr>
                            <td><?= Yii::t('frontend' , 'Registeration fees')?></td>
                            <td><span class="text-primary" id="regFees" data-value="<?= $courseObj->registeration_fees; ?>"><?= $courseObj->registeration_fees; ?> <?= $schoolObj->currency->currency_code?></span></td>
                        </tr>
                        <tr>
                            <td><?= Yii::t('frontend' , 'Study books fees')?></td>

                            <td><span class="text-primary" id="bookFees" data-value="<?= $courseObj->study_books_fees; ?>"><?= $courseObj->study_books_fees; ?> <?= $schoolObj->currency->currency_code?></span></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" class="bg-primary text-center"><h3><?= Yii::t('frontend' , 'Total')?>: {{total}} <?= $schoolObj->currency->currency_code?></h3></td>

                        </tr>
                    </tfoot>
                </table>

                <div class="mtlg">
                <?php
                if(!Yii::$app->user->isGuest && (User::IsRole(Yii::$app->user->id , User::ROLE_REFERRAL_COMPANY) || User::IsRole(Yii::$app->user->id , User::ROLE_REFERRAL_PERSON) )  ){
                    ?>
                    <a href="javascript:void(0)" class="button button-primary btn-block text-large" @click="submitReferal()"><?= Yii::t('frontend' , 'Apply Now')?></a>
                <?php }else{ ?>
                    <?php if(!Yii::$app->user->isGuest) :?>
                    <a href="javascript:void(0)" class="button button-primary btn-block text-large" @click="submitStudent()"><?= Yii::t('frontend' , 'Apply Now')?></a>
                    <?php else:?>
                        <a href="/login?return=/school/course/<?= $courseObj->slug ?>" class="button button-primary btn-block text-large" ><?= Yii::t('frontend' , 'Apply Now')?></a>
                    <?php endif;?>
                <?php } ?>
                </div>
            </div>
        </div>

    </div>
</section>




<section class="section">
    <div class="container">

        <div class="row">
            

            <div class="col-sm-12">
                <div>
                    <h2 class="title title-sm title-black"><?php echo Yii::t('common','Location on Map'); ?></h2>
                    <div>
                        <div class="map-wrapper">
                            <iframe src="https://maps.google.com/maps?q=<?= $schoolObj->lat?>,<?= $schoolObj->lng?>&hl=es;z=14&amp;output=embed"
                                    width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<section class="section">
    <div class="container">
        <h2 class="title text-center"><?= Yii::t('frontend','Other courses in'); ?>  <?= $courseObj->school->title?> </h2>

        <div class="universities universities-row">
            <?php
            foreach ($courseObj->school->schoolCourses as $coursData) {
                echo $this->render('_schoolWithOneCourse', ['course' => $coursData]);
            }
            ?>
        </div>

    </div>
</section>

</div>


<div class="successMsg" id="successMsg">
    <img src="/img/success.png">
    <h3><?= Yii::t('frontend','Your Request Success')   ?></h3>
    <p><?= Yii::t('frontend','Your Request Successfully Submited, Please check your profile.')   ?></p>
    <?php
                if(!Yii::$app->user->isGuest && (User::IsRole(Yii::$app->user->id , User::ROLE_REFERRAL_COMPANY) || User::IsRole(Yii::$app->user->id , User::ROLE_REFERRAL_PERSON) )  ){
                    ?>
    <a class="button button-primary" href="/referral-dashboard/requests"><?= Yii::t('frontend','Referral Program')   ?></a>

    <?php }else{
                    ?>
    <a class="button button-primary" href="/dashboard"><?= Yii::t('frontend','My Eduxa')   ?></a>

<?php } ?>     
</div>

<div class="successMsg error" id="errorMsg">
    <img src="/img/success.png">
    <h3><?= Yii::t('frontend','Request Sent')   ?></h3>
    <p><?= Yii::t('frontend','You request has been submitted before, please check your Eduxa profile.')   ?></p>
    <?php
                if(!Yii::$app->user->isGuest && (User::IsRole(Yii::$app->user->id , User::ROLE_REFERRAL_COMPANY) || User::IsRole(Yii::$app->user->id , User::ROLE_REFERRAL_PERSON) )  ){
                    ?>
    <a class="button button-primary" href="/referral-dashboard/requests"><?= Yii::t('frontend','Referral Program')   ?></a>

    <?php }else{
                    ?>
    <a class="button button-primary" href="/dashboard"><?= Yii::t('frontend','My Eduxa')   ?></a>

<?php } ?>     
</div>