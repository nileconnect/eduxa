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
			<h2 class="title title-black title-sm"><?= Yii::t('frontend' , 'Course Requirments')?></h2>

			<div class="ptlg pblg prlg pllg bg-white b-all text-large">
				<p>
					Conversations can be a tricky business. Sometimes, decoding what is said with what is meant is difficult at best. However, communication is a necessary tool in todays world. And it’s not only speaking that can be difficult, but trying to interpret body language, and other language barriers are just a few of the obstacles barring effective communication. It’s often been the case were one party completely miscommunicates to another due to a misunderstanding between parties. 
				</p>
			</div>
		</div>
	</section>


<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 ">

                <table class="table wide-cell text-large bg-white shadow-sm plmd prmd pbmd b-all">
                    <tbody>
                        <tr>
                            <td><?= Yii::t('frontend' , 'Minimum age')?></td>
                            <td><span class="text-primary">26 Years</span></td>
                        </tr>
                        <tr>
                            <td><?= Yii::t('frontend' , 'Required Level')?></td>
                            <td>
                                <div class="text-primary">25 Augest 2019</div>
                            </td>
                        </tr>
                        <tr>
                            <td><?= Yii::t('frontend' , 'Time Of Course')?></td>
                            <td>
                                <div class="text-primary">25 Augest 2019</div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td><?= Yii::t('frontend' , 'Lessons/Week')?></td>
                            <td><span class="text-primary">22</span></td>
                        </tr>
                        <tr>
                            <td><?= Yii::t('frontend' , 'Lesson Duration')?></td>
                            <td><span class="text-primary">22</span></td>
                        </tr>
                        <tr>
                            <td><?= Yii::t('frontend' , 'Max No Of Students Per Class')?></td>
                            <td><span class="text-primary">19</span></td>
                        </tr>
                        <tr>
                            <td><?= Yii::t('frontend' , 'Avg No Of Students Per Class')?></td>
                            <td><span class="text-primary">10</span></td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="bg-white shadow-sm b-all mtmd">
                    <div class="pllg prlg pblg ptlg">
                        <div class="select-wrapper">
                            <select name="" id="" class="form-control">
                                <option>Accommodation options</option>
                                <option value="1">1</option>
                                <option value="1">2</option>
                                <option value="1">3</option>
                            </select>
                        </div>
                        
                    </div>
                    <table class="table text-large wide-cell">
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
                                <td><?= Yii::t('frontend' , 'Maximum Age')?></td>
                                <td><span class="text-primary">250 Meters Away</span></td>
                            </tr>
                            <tr>
                                <td><?= Yii::t('frontend' , 'Distance from school (Minutes)')?></td>
                                <td><span class="text-primary">250 Meters Away</span></td>
                            </tr>
                            <tr>
                                <td><?= Yii::t('frontend' , 'Cost per Duration	')?></td>
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
                            <td><?= Yii::t('frontend' , 'Accomodation fees')?></td>
                            <td><span class="text-primary">20 USD</span></td>
                        </tr>
                        <tr>
                            <td><?= Yii::t('frontend' , 'Registeration fees')?></td>
                            <td><span class="text-primary">20 USD</span></td>
                        </tr>
                        <tr>
                            <td><?= Yii::t('frontend' , 'Study books fees')?></td>
                            <td><span class="text-primary">20 USD</span></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" class="bg-primary text-center"><h3>Total: 240 USD</h3></td>
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
									<div class="jq_rating jq-stars" data-options="{&quot;initialRating&quot;:4.8, &quot;readOnly&quot;:true, &quot;starSize&quot;:19}"><div class="jq-star" style="width:19px;  height:19px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-112{fill:url(#112_SVGID_1_);}.svg-hovered-112{fill:url(#112_SVGID_2_);}.svg-active-112{fill:url(#112_SVGID_3_);}.svg-rated-112{fill:#FFCB04;}</style><linearGradient id="112_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#c5d0c0"></stop><stop offset="1" style="stop-color:#c5d0c0"></stop> </linearGradient><linearGradient id="112_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><linearGradient id="112_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><path data-side="center" class="svg-empty-112" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-112" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-112" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div><div class="jq-star" style="width:19px;  height:19px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-112{fill:url(#112_SVGID_1_);}.svg-hovered-112{fill:url(#112_SVGID_2_);}.svg-active-112{fill:url(#112_SVGID_3_);}.svg-rated-112{fill:#FFCB04;}</style><linearGradient id="112_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#c5d0c0"></stop><stop offset="1" style="stop-color:#c5d0c0"></stop> </linearGradient><linearGradient id="112_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><linearGradient id="112_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><path data-side="center" class="svg-empty-112" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-112" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-112" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div><div class="jq-star" style="width:19px;  height:19px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-112{fill:url(#112_SVGID_1_);}.svg-hovered-112{fill:url(#112_SVGID_2_);}.svg-active-112{fill:url(#112_SVGID_3_);}.svg-rated-112{fill:#FFCB04;}</style><linearGradient id="112_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#c5d0c0"></stop><stop offset="1" style="stop-color:#c5d0c0"></stop> </linearGradient><linearGradient id="112_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><linearGradient id="112_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><path data-side="center" class="svg-empty-112" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-112" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-112" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div><div class="jq-star" style="width:19px;  height:19px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-112{fill:url(#112_SVGID_1_);}.svg-hovered-112{fill:url(#112_SVGID_2_);}.svg-active-112{fill:url(#112_SVGID_3_);}.svg-rated-112{fill:#FFCB04;}</style><linearGradient id="112_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#c5d0c0"></stop><stop offset="1" style="stop-color:#c5d0c0"></stop> </linearGradient><linearGradient id="112_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><linearGradient id="112_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><path data-side="center" class="svg-empty-112" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-112" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-112" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div><div class="jq-star" style="width:19px;  height:19px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-112{fill:url(#112_SVGID_1_);}.svg-hovered-112{fill:url(#112_SVGID_2_);}.svg-active-112{fill:url(#112_SVGID_3_);}.svg-rated-112{fill:#FFCB04;}</style><linearGradient id="112_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#c5d0c0"></stop><stop offset="1" style="stop-color:#c5d0c0"></stop> </linearGradient><linearGradient id="112_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><linearGradient id="112_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><path data-side="center" class="svg-empty-112" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-112" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-112" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div></div> 
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
							<div class="item-label">Hours/week</div>
							<div>22 hrs</div>
						</div>
						<div>
							<div class="item-label">Study Time</div>
							<div>Morning</div>
						</div>
						<div>
							<div class="item-label">Best price</div>
							<div><span class="original-price">150</span><span class="sale-on">27.00</span> <span class="currency">USD</span></div>
							<div><span class="converted-price">2500</span> <span class="sale-on">27.00</span> <span class="currency">LE</span></div>
						</div>
						<div>
							<a href="#" class="button btn-block button-primary">Additional Info</a>
						</div>
					</footer>
				</div>

				<div class="item">
					<header class="item-header">
						<figure>
							<span class="cut-off">25%</span>
							<img src="img/destinations/4.jpg" alt="">
						</figure>
						<div class="item-content">
							<div class="item-name">
								<span>Language Academy - General English</span>
								<div class="rating">
									<div class="jq_rating jq-stars" data-options="{&quot;initialRating&quot;:4.8, &quot;readOnly&quot;:true, &quot;starSize&quot;:19}"><div class="jq-star" style="width:19px;  height:19px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-372{fill:url(#372_SVGID_1_);}.svg-hovered-372{fill:url(#372_SVGID_2_);}.svg-active-372{fill:url(#372_SVGID_3_);}.svg-rated-372{fill:#FFCB04;}</style><linearGradient id="372_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#c5d0c0"></stop><stop offset="1" style="stop-color:#c5d0c0"></stop> </linearGradient><linearGradient id="372_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><linearGradient id="372_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><path data-side="center" class="svg-empty-372" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-372" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-372" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div><div class="jq-star" style="width:19px;  height:19px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-372{fill:url(#372_SVGID_1_);}.svg-hovered-372{fill:url(#372_SVGID_2_);}.svg-active-372{fill:url(#372_SVGID_3_);}.svg-rated-372{fill:#FFCB04;}</style><linearGradient id="372_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#c5d0c0"></stop><stop offset="1" style="stop-color:#c5d0c0"></stop> </linearGradient><linearGradient id="372_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><linearGradient id="372_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><path data-side="center" class="svg-empty-372" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-372" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-372" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div><div class="jq-star" style="width:19px;  height:19px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-372{fill:url(#372_SVGID_1_);}.svg-hovered-372{fill:url(#372_SVGID_2_);}.svg-active-372{fill:url(#372_SVGID_3_);}.svg-rated-372{fill:#FFCB04;}</style><linearGradient id="372_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#c5d0c0"></stop><stop offset="1" style="stop-color:#c5d0c0"></stop> </linearGradient><linearGradient id="372_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><linearGradient id="372_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><path data-side="center" class="svg-empty-372" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-372" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-372" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div><div class="jq-star" style="width:19px;  height:19px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-372{fill:url(#372_SVGID_1_);}.svg-hovered-372{fill:url(#372_SVGID_2_);}.svg-active-372{fill:url(#372_SVGID_3_);}.svg-rated-372{fill:#FFCB04;}</style><linearGradient id="372_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#c5d0c0"></stop><stop offset="1" style="stop-color:#c5d0c0"></stop> </linearGradient><linearGradient id="372_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><linearGradient id="372_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><path data-side="center" class="svg-empty-372" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-372" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-372" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div><div class="jq-star" style="width:19px;  height:19px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-372{fill:url(#372_SVGID_1_);}.svg-hovered-372{fill:url(#372_SVGID_2_);}.svg-active-372{fill:url(#372_SVGID_3_);}.svg-rated-372{fill:#FFCB04;}</style><linearGradient id="372_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#c5d0c0"></stop><stop offset="1" style="stop-color:#c5d0c0"></stop> </linearGradient><linearGradient id="372_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><linearGradient id="372_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><path data-side="center" class="svg-empty-372" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-372" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-372" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div></div> 
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
							<div class="item-label">Hours/week</div>
							<div>19 hrs</div>
						</div>
						<div>
							<div class="item-label">Study Time</div>
							<div>Morning</div>
						</div>
						<div>
							<div class="item-label">Best price</div>
							<div><span class="original-price">150</span><span class="sale-on">27.00</span> <span class="currency">USD</span></div>
							<div><span class="converted-price">2500</span> <span class="sale-on">27.00</span> <span class="currency">LE</span></div>
						</div>
						<div>
							<a href="#" class="button btn-block button-primary">Additional Info</a>
						</div>
					</footer>
				</div>

				<div class="item">
					<header class="item-header">
						<figure>
							<img src="img/destinations/3.jpg" alt="">
						</figure>
						<div class="item-content">
							<div class="item-name">
								<span>Language Academy - General English</span>
								<div class="rating">
									<div class="jq_rating jq-stars" data-options="{&quot;initialRating&quot;:4.8, &quot;readOnly&quot;:true, &quot;starSize&quot;:19}"><div class="jq-star" style="width:19px;  height:19px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-138{fill:url(#138_SVGID_1_);}.svg-hovered-138{fill:url(#138_SVGID_2_);}.svg-active-138{fill:url(#138_SVGID_3_);}.svg-rated-138{fill:#FFCB04;}</style><linearGradient id="138_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#c5d0c0"></stop><stop offset="1" style="stop-color:#c5d0c0"></stop> </linearGradient><linearGradient id="138_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><linearGradient id="138_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><path data-side="center" class="svg-empty-138" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-138" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-138" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div><div class="jq-star" style="width:19px;  height:19px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-138{fill:url(#138_SVGID_1_);}.svg-hovered-138{fill:url(#138_SVGID_2_);}.svg-active-138{fill:url(#138_SVGID_3_);}.svg-rated-138{fill:#FFCB04;}</style><linearGradient id="138_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#c5d0c0"></stop><stop offset="1" style="stop-color:#c5d0c0"></stop> </linearGradient><linearGradient id="138_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><linearGradient id="138_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><path data-side="center" class="svg-empty-138" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-138" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-138" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div><div class="jq-star" style="width:19px;  height:19px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-138{fill:url(#138_SVGID_1_);}.svg-hovered-138{fill:url(#138_SVGID_2_);}.svg-active-138{fill:url(#138_SVGID_3_);}.svg-rated-138{fill:#FFCB04;}</style><linearGradient id="138_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#c5d0c0"></stop><stop offset="1" style="stop-color:#c5d0c0"></stop> </linearGradient><linearGradient id="138_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><linearGradient id="138_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><path data-side="center" class="svg-empty-138" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-138" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-138" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div><div class="jq-star" style="width:19px;  height:19px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-138{fill:url(#138_SVGID_1_);}.svg-hovered-138{fill:url(#138_SVGID_2_);}.svg-active-138{fill:url(#138_SVGID_3_);}.svg-rated-138{fill:#FFCB04;}</style><linearGradient id="138_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#c5d0c0"></stop><stop offset="1" style="stop-color:#c5d0c0"></stop> </linearGradient><linearGradient id="138_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><linearGradient id="138_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><path data-side="center" class="svg-empty-138" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-138" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-138" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div><div class="jq-star" style="width:19px;  height:19px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-138{fill:url(#138_SVGID_1_);}.svg-hovered-138{fill:url(#138_SVGID_2_);}.svg-active-138{fill:url(#138_SVGID_3_);}.svg-rated-138{fill:#FFCB04;}</style><linearGradient id="138_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#c5d0c0"></stop><stop offset="1" style="stop-color:#c5d0c0"></stop> </linearGradient><linearGradient id="138_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><linearGradient id="138_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><path data-side="center" class="svg-empty-138" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-138" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-138" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div></div> 
									<span class="text-muted">(65)</span>
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
							<div class="item-label">Hours/week</div>
							<div>41 hrs</div>
						</div>
						<div>
							<div class="item-label">Study Time</div>
							<div>Morning</div>
						</div>
						<div>
							<div class="item-label">Best price</div>
							<div><span class="original-price">150</span> <span class="currency">USD</span></div>
							<div><span class="converted-price">2500</span> <span class="currency">LE</span></div>
						</div>
						<div>
							<a href="#" class="button btn-block button-primary">Additional Info</a>
						</div>
					</footer>
				</div>

			</div>

		</div>
	</section>
