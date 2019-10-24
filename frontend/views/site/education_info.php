<?php
/* @var $this yii\web\View */
$this->title = Yii::$app->name;
?>

<main class="content">

	<section class="section bg-white">
		<div class="container">
			
			<div class="profile_info">
				<div class="profile_basic_info">
					<figure>
						<a href="#" class="edit_profile_info"><i class="fas fa-pencil-alt"></i></a>
						<img class="avatar" src="/dist/img/avatars/default-avatar.png" alt="">
					</figure>
					<div>
						<h3>Mukhtar Ali</h3>
						<div class="text-muted text-large">Cairo, Egypt</div>
						<div class="text-muted text-large"><a href="mailto:info@mokhtarali.com">info@mokhtarali.com</a></div>
						<div class="text-muted text-large"><a href="tel:+2 011 XX XXX XXX">+2 011 XX XXX XXX</a></div>
					</div>
				</div>
				<div class="profile_info_complation">
					<div class="profile_complete_progress">
						<div class="progress">
						  	<div class="progress-bar progress-bar-yellow" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
						</div>
						<div class="text-right mrsm text-muted"><small>Your Profile is 40% complete</small></div>
					</div>
					<div class="edit_profile_complation">
						<a href="#"><i class="fas fa-edit"></i></a>
					</div>
				</div>
			</div>

		</div>
	</section>

	<div class="profile-nav bg-white">
		<div class="container">
			
			<ul class="nav nav-pills regular border-white">
			  <li class="nav-item">
			    <a class="nav-link"  href="/site/profile_info">Profile Info</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link active" href="/site/education_info">Education Info</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="/site/my_requests">My Requests</a>
			  </li>
			</ul>

		</div>
	</div>


	<section class="section">
		<div class="container">
			
			<div class="mtlg">
				<h2 class="title title-sm"><i class="fas fa-graduation-cap"></i> Last Educational Qulaifications</h2>	

				<div class="row bg-white pllg prlg ptlg pblg shadow-sm mbxlg">
					<div class="col-sm-6">
						<div class="text-large">
							<span>Certificate : </span>
							<span class="text-muted">Becholar of data science</span>
						</div>
						<div class="text-large">
							<span>Grade : </span>
							<span class="text-muted">Very Good</span>
						</div>
						<div class="text-large">
							<span>Work experience : </span>
							<span class="text-muted">Software developer</span>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="text-large">
							<span>Year Of Graduation :</span>
							<span class="text-muted">2019</span>
						</div>
						<div class="text-large">
							<span>Certificate Language : </span>
							<span class="text-muted">English</span>
						</div>
					</div>
				</div>
				
				<h2 class="title title-sm"><i class="fas fa-graduation-cap"></i> Other Certifications</h2>	

				<div class="row mtmd bg-white pllg prlg ptlg pblg shadow-sm">
					<div class="col-sm-6">
						<div class="text-large">
							<span>Certificate : </span>
							<span class="text-muted">Becholar of data science</span>
						</div>
						<div class="text-large">
							<span>Grade : </span>
							<span class="text-muted">Very Good</span>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="text-large">
							<span>Year Of Graduation :</span>
							<span class="text-muted">2019</span>
						</div>
						<div class="text-large">
							<span>Country : </span>
							<span class="text-muted">Egypt</span>
						</div>
					</div>
				</div>

				<div class="mtlg">
					<button type="button" class="button button-wide button-primary" data-toggle="modal" data-target="#CertigicateModal">Add Certigicate</button>
				</div>
			</div>

		</div>
	</section>

</main>