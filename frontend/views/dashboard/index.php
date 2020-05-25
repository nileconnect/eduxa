<main class="content">

	<section class="section bg-white">
		<div class="container">
			
			<div class="profile_info">
				<div class="profile_basic_info">
					<figure>
						<a href="#" class="edit_profile_info"><i class="fas fa-pencil-alt"></i></a>
						<img class="avatar" src="img/avatars/default-avatar.png" alt="">
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
						<div class="text-right mrsm text-muted"><small><?php echo Yii::t('frontend','Your Profile is'); ?> 40% <?php echo Yii::t('frontend','complete'); ?></small></div>
					</div>
					<div class="edit_profile_complation">
                        <a href="" data-toggle="modal" data-target="#EditprofileModal"><i class="fas fa-edit"></i></a>
                        
					</div>
				</div>
			</div>

		</div>
	</section>

	<div class="profile-nav bg-white">
		<div class="container">
			
			<ul class="nav nav-pills regular border-white">
			  <li class="nav-item">
			    <a class="nav-link active" href="/dashboard"><?php echo Yii::t('frontend','Profile Info'); ?></a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="/dashboard/education"><?php echo Yii::t('frontend','Education Info'); ?></a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="/dashboard/requests"><?php echo Yii::t('frontend','My Requests'); ?></a>
			  </li>
			</ul>

		</div>
	</div>


	<section class="section">
		<div class="container">

			<div class="mtlg">
				<h2 class="title title-sm"><i class="far fa-user"></i> <?php echo Yii::t('frontend','Profile Summery'); ?></h2>
				
				<div class="row bg-white shadow-sm ptlg prlg pllg pblg">
					<div class="col-sm-6">
						<div class="text-large">
							<span><?php echo Yii::t('frontend','Name'); ?> : </span>
							<span class="text-muted">Ahmed Saeed</span>
						</div>
						<div class="text-large">
							<span><?php echo Yii::t('frontend','Email'); ?> : </span>
							<span class="text-muted">mr.ahmedsaeed1@gmail.com</span>
						</div>
						<div class="text-large">
							<span><?php echo Yii::t('frontend','Gender'); ?> : </span>
							<span class="text-muted">Male</span>
						</div>
						<div class="text-large">
							<span><?php echo Yii::t('frontend','Mobile Number'); ?> : </span>
							<span class="text-muted">+201067258000</span>
						</div>
						<div class="text-large">
							<span><?php echo Yii::t('frontend','Nationality'); ?> : </span>
							<span class="text-muted">Egyptian</span>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="text-large">
							<span><?php echo Yii::t('frontend','County'); ?> : </span>
							<span class="text-muted">Egypt</span>
						</div>
						<div class="text-large">
							<span><?php echo Yii::t('frontend','City'); ?> : </span>
							<span class="text-muted">Cairo</span>
						</div>
						<div class="text-large">
							<span><?php echo Yii::t('frontend','Best way of communication'); ?> : </span>
							<span class="text-muted">Phone</span>
						</div>
						<div class="text-large">
							<span><?php echo Yii::t('frontend','Intersted In'); ?> : </span>
							<span class="text-muted">School Language</span>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>

</main>

<!-- Modal -->
<div class="modal fade" id="EditprofileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalCenterTitle"><?php echo Yii::t('frontend','Edit my info'); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-sm-6">
        		<div class="form-group">
        			<label for="" class="label-control"><?php echo Yii::t('frontend','Name'); ?></label>
        			<input type="text" name="" class="form-control" placeholder="">
        		</div>
            </div>
            <div class="col-sm-6">
        		<div class="form-group">
        			<label for="" class="label-control"><?php echo Yii::t('frontend','County'); ?></label>
        			<div class="select-wrapper">
        				<select name="" id="" class="form-control">
        					<option value="1">Male</option>
	        				<option value="1">Female</option>
        				</select>
        			</div>
        		</div>
        	</div>
            <div class="col-sm-6">
        		<div class="form-group">
        			<label for="" class="label-control"><?php echo Yii::t('frontend','Email'); ?></label>
        			<input type="email" name="" class="form-control" placeholder="">
        		</div>
            </div>
            <div class="col-sm-6">
        		<div class="form-group">
        			<label for="" class="label-control"><?php echo Yii::t('frontend','City'); ?></label>
        			<div class="select-wrapper">
        				<select name="" id="" class="form-control">
        					<option value="1">Male</option>
	        				<option value="1">Female</option>
        				</select>
        			</div>
        		</div>
        	</div>
        	<div class="col-sm-6">
        		<div class="form-group">
        			<label for="" class="label-control"><?php echo Yii::t('frontend','Gender'); ?></label>
        			<div class="select-wrapper">
        				<select name="" id="" class="form-control">
        					<option value="1">Male</option>
	        				<option value="1">Female</option>
        				</select>
        			</div>
        		</div>
            </div>
            <div class="col-sm-6">
        		<div class="form-group">
        			<label for="" class="label-control"><?php echo Yii::t('frontend','Best way of communication'); ?></label>
        			<div class="select-wrapper">
        				<select name="" id="" class="form-control">
        					<option value="1">Male</option>
	        				<option value="1">Female</option>
        				</select>
        			</div>
        		</div>
            </div>
            <div class="col-sm-6">
        		<div class="form-group">
        			<label for="" class="label-control"><?php echo Yii::t('frontend','Mobile Number'); ?></label>
        			<input type="text" name="" class="form-control" placeholder="">
        		</div>
            </div>
            <div class="col-sm-6">
        		<div class="form-group">
        			<label for="" class="label-control"><?php echo Yii::t('frontend','Intersted In'); ?></label>
        			<div class="select-wrapper">
        				<select name="" id="" class="form-control">
        					<option value="1">Male</option>
	        				<option value="1">Female</option>
        				</select>
        			</div>
        		</div>
            </div>
            <div class="col-sm-6">
        		<div class="form-group">
        			<label for="" class="label-control"><?php echo Yii::t('frontend','Nationality'); ?></label>
        			<div class="select-wrapper">
        				<select name="" id="" class="form-control">
        					<option value="1">Male</option>
	        				<option value="1">Female</option>
        				</select>
        			</div>
        		</div>
            </div>
        </div>

        

        <div class="form-group">
     			<button type="submit" class="button button-primary button-wide">Save</button>
     		</div>
      </div>
    </div>
  </div>
</div>