<?php
$this->title = 'Statistic';
?>
<div class="row">
    <div class="col-md-8 col-sm-12">
        <h3 class="box-title">Registerd Users</h3>
        <div class="box-body">
            <div class="row">
                <div class="col-md-7">
                    <div class="chart-responsive">
                        <canvas id="pieChart" height="150"></canvas>
                    </div>
                </div>
                <div class="col-md-5">
                    <ul class="chart-legend clearfix" style="margin-top: 70px;">
                        <li><i class="fa fa-circle-o text-red"></i> No. of Students (<?= $studentsCount ?>)</li>
                        <li><i class="fa fa-circle-o text-green"></i> No. of Individual Referral (<?= $referralPersonCount ?>)</li>
                        <li><i class="fa fa-circle-o text-yellow"></i> No. of Compoany Referral (<?= $referralCompanyCount ?>)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <h3 class="box-title">Educational Institution Statistic</h3>
        <table class="kv-grid-table table table-bordered table-striped kv-table-wrap">
            <tr>
                <td>no. of University</td>
                <td><?= $universityCount ?></td>
            </tr>
            <tr>
                <td>no. of Majors</td>
                <td><?= $universityProgramMajorsCount ?></td>
            </tr>
            <tr>
                <td>no. of Programs</td>
                <td><?= $universityProgramsCount ?></td>
            </tr>
            <tr>
                <td>no. of Schools</td>
                <td><?= $schoolsCount ?></td>
            </tr>
            <tr>
                <td>no. of Courses</td>
                <td><?= $coursesCount ?></td>
            </tr>
            <tr>
                <td>No. of Subscribers to newsletters</td>
                <td><?= $newslettersCount ?></td>
            </tr>

        </table>
    </div>
</div>
<!-- /.box -->



<?php
$js = <<<JS
$(function () {
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
      {
        value    : $studentsCount,
        color    : '#f56954',
        highlight: '#f56954',
        label    : 'No. of Students'
      },
      {
        value    : $referralPersonCount,
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : 'No. of Individual Referral'
      },
      {
        value    : $referralCompanyCount,
        color    : '#f39c12',
        highlight: '#f39c12',
        label    : 'No. of Compoany Referral'
      }
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)


})
JS;
$this->registerJs($js);

?>
