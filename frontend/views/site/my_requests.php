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
			    <a class="nav-link" href="/site/education_info">Education Info</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link active" href="/site/my_requests">My Requests</a>
			  </li>
			</ul>

		</div>
	</div>


	<section class="section">
		<div class="container">

			<div class="mtlg">
				<h2 class="title title-sm"><i class="fas fa-paste"></i> My Requests</h2>
			
				<div class="universities universities-row">

					<div class="item">
						<header class="item-header">
							<figure>
								<img src="/dist/img/destinations/3.jpg" alt="">
							</figure>
							<div class="item-content">
								<div class="item-name">
									<span>University Name</span>
									<div class="status">
										<span class="status-text text-primary">Panding</span>
										<span class="status-number">#546132</span>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="mtsm">
											<div>
												<span>Start Day : </span>
												<span class="text-muted">20/06/2019</span>
											</div>
											<div>
												<span>Reservation Duration : </span>
												<span class="text-muted">3 Weeks</span>
											</div>
											<div>
												<span>Country : </span>
												<span class="text-muted">Egypt</span>
											</div>
											<div>
												<span>City : </span>
												<span class="text-muted">Cairo</span>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="mtsm">
											<div>
												<span>Accommodation Types : </span>
												<span class="text-muted">Motel</span>
											</div>
											<div>
												<span>Airport Transportaion : </span>
												<span class="text-muted">Yes</span>
											</div>
											<div>
												<span>Medical Insurance : </span>
												<span class="text-muted">No</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</header>
					</div>

					<div class="item">
						<header class="item-header">
							<figure>
								<img src="/dist/img/destinations/1.jpg" alt="">
							</figure>
							<div class="item-content">
								<div class="item-name">
									<span>Program Name</span>
									<div class="status">
										<span class="status-text text-primary">Panding</span>
										<span class="status-number">#546132</span>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="mtsm">
											<div>
												<span>Start Day : </span>
												<span class="text-muted">20/06/2019</span>
											</div>
											<div>
												<span>Reservation Duration : </span>
												<span class="text-muted">3 Weeks</span>
											</div>
											<div>
												<span>Country : </span>
												<span class="text-muted">Egypt</span>
											</div>
											<div>
												<span>City : </span>
												<span class="text-muted">Cairo</span>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="mtsm">
											<div>
												<span>Accommodation Types : </span>
												<span class="text-muted">Motel</span>
											</div>
											<div>
												<span>Airport Transportaion : </span>
												<span class="text-muted">Yes</span>
											</div>
											<div>
												<span>Medical Insurance : </span>
												<span class="text-muted">No</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</header>
					</div>

				</div>
			</div>

		</div>
	</section>

</main>