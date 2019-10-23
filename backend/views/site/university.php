
<?php

if($University){
      //  echo "<a href='/university/manager-view'>".$University->title ."</a>";
}else{

    echo "<h2>No Universities Assigned Yet</h2>";
}
?>


<?php

if($University){

?>
<div class="row">
    <div class="col-md-4">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-red">
                <div class="widget-user-image">
                <img class="img-circle" src="/img/univLogo.jpg" alt="university image">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username"><?echo $University->title;?></h3>
                <h5 class="widget-user-desc">University Manager</h5>
            </div>
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                <li><a href="/university/manager-view">University Details</a></li>
                <li><a href="/university/manager-update">Manage University</a></li>
                
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <!-- /.widget-user -->
        <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" src="/img/univLogo.jpg" alt="university image">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Programs</h3>
              <h5 class="widget-user-desc">Manage programs</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="/manager-university-programs">Programs List</a></li>
                <li><a href="manager-university-programs/create">Create Program</a></li>
               
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
    </div>
</div>


<?php
}
?>