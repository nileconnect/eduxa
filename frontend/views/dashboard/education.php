<main class="content">
    <?php

    $this->beginContent('@frontend/views/dashboard/_profile_data.php');
    $this->endContent() ;

    $this->beginContent('@frontend/views/dashboard/_profile_menu.php');
    $this->endContent() ;
    ?>

	<section class="section">
		<div class="container">
			
			<div class="mtlg">


				
				<h2 class="title title-sm"><i class="fas fa-graduation-cap"></i> Certificates</h2>

				<?php
                if($user->studentCertificates){
                    foreach ($user->studentCertificates as $userCertificate) {
                        ?>
                        <div class="row mtmd bg-white pllg prlg ptlg pblg shadow-sm">
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
                            <div class="col-sm-12">

                                <a class="button button-wide button-primary pull-right"  data-fancybox="" data-type="iframe"
                                   data-options='{"type" : "iframe", "iframe" : {"preload" : false, "css" : {"width" : "600px" , "height" : "400px" }}}'
                                   href="/dashboard/certificate?id=<?= $userCertificate->id ?>">
                                    Edit
                                </a>

                            </div>
                        </div>
                        <?
                    }
                }
                ?>

				<div class="mtlg">
                    <a class="button button-wide button-primary" data-fancybox="" data-type="iframe"
                       data-options='{"type" : "iframe", "iframe" : {"preload" : false, "css" : {"width" : "600px" , "height" : "400px" }}}'
                       href="/dashboard/certificate">
                    Add Certificate
                    </a>
				</div>



				<div class="mtlg">
				
				<h2 class="title title-sm"><i class="fas fa-graduation-cap"></i> Test Results</h2>

                    <?php
                    if($user->studentTestResults){
                    foreach ($user->studentTestResults as $userTest) {
                    ?>
                        <div class="row mtmd bg-white pllg prlg ptlg pblg shadow-sm">
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
                            <div class="col-sm-12">
                                <a class="button button-wide button-primary pull-right"  data-fancybox="" data-type="iframe"
                                   data-options='{"type" : "iframe", "iframe" : {"preload" : false, "css" : {"width" : "600px" , "height" : "300px" }}}'
                                   href="/dashboard/test-result?id=<?= $userTest->id ?>">
                                    Edit
                                </a>
                            </div>

                        </div>

                        <?
                     }
                    }
                    ?>
                    <div class="mtlg">
                        <a class="button button-wide button-primary" data-fancybox="" data-type="iframe"
                           data-options='{"type" : "iframe", "iframe" : {"preload" : false, "css" : {"width" : "600px" , "height" : "400px" }}}'
                           href="/dashboard/test-results">
                            Add Test Results
                        </a>
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