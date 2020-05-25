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
					<div class="col-sm-12">
						<button type="button" class="button button-wide button-primary" style="float:right" data-toggle="modal" data-target="#QulaificationsModal">Edit</button>
					</div>
				</div>
				<div class="mtlg" style="margin-bottom:20px">
					<button type="button" class="button button-wide button-primary" data-toggle="modal" data-target="#QulaificationsModal">Add Educational Qulaifications</button>
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
					<div class="col-sm-12">
						<button type="button" class="button button-wide button-primary" style="float:right" data-toggle="modal" data-target="#CertigicateModal">Edit</button>
					</div>
				</div>

				<div class="mtlg">
					<button type="button" class="button button-wide button-primary" data-toggle="modal" data-target="#CertigicateModal">Add Certigicate</button>
				</div>
				<div class="mtlg">
				
				<h2 class="title title-sm"><i class="fas fa-graduation-cap"></i> Other Test Results</h2>	

				<div class="row mtmd bg-white pllg prlg ptlg pblg shadow-sm">
					<div class="col-sm-6">
						<div class="text-large">
							<span>Test Name : </span>
							<span class="text-muted">ilets</span>
						</div>
						<div class="text-large">
							<span>score : </span>
							<span class="text-muted">10</span>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="text-large">
							<span>Test Date :</span>
							<span class="text-muted">2019</span>
						</div>
					</div>
					<div class="col-sm-12">
						<button type="button" class="button button-wide button-primary" style="float:right" data-toggle="modal" data-target="#testResultsModal">Edit</button>
					</div>
				
				</div>
				<div class="mtlg">
					<button type="button" class="button button-wide button-primary" data-toggle="modal" data-target="#testResultsModal">Add Test Results</button>
				</div>

			</div>
			</div>

		</div>
	</section>

</main>


<!-- Modal -->
<div class="modal fade" id="CertigicateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalCenterTitle">Add Certificate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-sm-6">
        		<div class="form-group">
        			<label for="" class="label-control">Certificate Name</label>
        			<input type="text" name="" class="form-control" placeholder="">
        		</div>
        	</div>
        	<div class="col-sm-6">
        		<div class="form-group">
        			<label for="" class="label-control">Year</label>
        			<div class="select-wrapper">
        				<select name="" id="" class="form-control">
        					<option value="1">2000</option>
	        				<option value="1">2001</option>
	        				<option value="1">2002</option>
	        				<option value="1">2003</option>
        				</select>
        			</div>
        		</div>
        	</div>
        </div>

        <div class="row">
        	<div class="col-sm-6">
        		<div class="form-group">
        			<label for="" class="label-control">Grade</label>
        			<input type="text" name="" class="form-control" placeholder="">
        		</div>
        	</div>
        	<div class="col-sm-6">
        		<div class="form-group">
        			<label for="" class="label-control">University Or School</label>
        			<input type="text" name="" class="form-control" placeholder="">
        		</div>
        	</div>
        </div>

        <div class="row">
        	<div class="col-sm-6">
        		<div class="form-group">
        			<label for="" class="label-control">Country</label>
        			<div class="select-wrapper">
        				<select name="" id="" class="form-control">
        					<option value="1">Egypt</option>
	        				<option value="1">France</option>
	        				<option value="1">United State</option>
	        				<option value="1">England</option>
        				</select>
        			</div>
        		</div>
        	</div>
        </div>

        <div class="form-group">
     			<button type="submit" class="button button-primary button-wide">Submit</button>
     		</div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="QulaificationsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalCenterTitle">Add Educational Qulaifications</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-sm-6">
        		<div class="form-group">
        			<label for="" class="label-control">Certificate Name</label>
        			<input type="text" name="" class="form-control" placeholder="">
        		</div>
        	</div>
        	<div class="col-sm-6">
        		<div class="form-group">
        			<label for="" class="label-control">Year Of Graduation</label>
        			<input type="text" name="" class="form-control" placeholder="">
        		</div>
        	</div>
        </div>

        <div class="row">
        	<div class="col-sm-6">
        		<div class="form-group">
        			<label for="" class="label-control">Grade</label>
        			<input type="text" name="" class="form-control" placeholder="">
        		</div>
        	</div>
        	<div class="col-sm-6">
        		<div class="form-group">
        			<label for="" class="label-control">Certificate Language</label>
        			<input type="text" name="" class="form-control" placeholder="">
        		</div>
        	</div>
        </div>

        <div class="row">
        	<div class="col-sm-6">
        		<div class="form-group">
        			<label for="" class="label-control">Work experience</label>
        			<input type="text" name="" class="form-control" placeholder="">
        		</div>
        	</div>
        </div>

        <div class="form-group">
     			<button type="submit" class="button button-primary button-wide">Submit</button>
     		</div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="testResultsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title text-primary" id="exampleModalCenterTitle">Add Test Results</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
		  <div class="row">
			  <div class="col-sm-6">
				  <div class="form-group">
					  <label for="" class="label-control">Test Name</label>
					  <input type="text" name="" class="form-control" placeholder="">
				  </div>
			  </div>
			  <div class="col-sm-6">
				  <div class="form-group">
					  <label for="" class="label-control">Year</label>
					  <div class="select-wrapper">
						  <select name="" id="" class="form-control">
							  <option value="1">2000</option>
							  <option value="1">2001</option>
							  <option value="1">2002</option>
							  <option value="1">2003</option>
						  </select>
					  </div>
				  </div>
			  </div>
		  </div>
  
		  <div class="row">
			  <div class="col-sm-6">
				  <div class="form-group">
					  <label for="" class="label-control">Score</label>
					  <input type="text" name="" class="form-control" placeholder="">
				  </div>
			  </div>
		  </div>
  
		  <div class="form-group">
				   <button type="submit" class="button button-primary button-wide">Submit</button>
			   </div>
		</div>
	  </div>
	</div>
  </div>