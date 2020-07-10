<?php

use backend\models\Requests;
use backend\models\SchoolCourse;

?>
<bold>Welcome </bold>  <?= $data->student_first_name ?> , Your Request Status for <?= $data->modelObj->title ?>  Updated to be <?= Requests::ListStatus()[$data->status] ?>
<br/>
<h3>Request Information</h3>

<?php 
    if($data->model_name == Requests::MODEL_NAME_PROGRAM):
    $program    = $data->modelObj;
    $university = $data->modelParentObj;
?>
<table width="50%">
    <tr>
        <td>
            Start Day:
        </td>
        <td>
            <?= $program->first_submission_date?>
        </td>
    </tr>
    <tr>
        <td>
            Reservation Duration:
        </td>
        <td>
            <?= $program->study_duration_no ?>
            <?= \backend\models\University::listPeriods()[$program->study_duration] ?>
        </td>
    </tr>
    <tr>
        <td>
            Country:
        </td>
        <td>
            <?= $university->country->title?>
        </td>
    </tr>

    <tr>
        <td>
            State:
        </td>
        <td>
            <?= $university->state->title?>
        </td>
    </tr>

    <tr>
        <td>
            City:
        </td>
        <td>
            <?= $university->city->title?>
        </td>
    </tr>

    <tr>
        <td>
            Major:
        </td>
        <td>
            <?= $program->major->title ?>
        </td>
    </tr>

    <tr>
        <td>
            Degree:
        </td>
        <td>
            <?= $program->degree->title ?>
        </td>
    </tr>

    <tr>
        <td>
            Field:
        </td>
        <td>
            <?= $program->field->title ?>
        </td>
    </tr>
</table>

<?php else:
$course = $data->modelObj;
$school = $data->modelParentObj;    
?>

<table width="50%">
    <tr>
        <td>
            Course Type:
        </td>
        <td>
            <?= $course->schoolCourseType->title?>
        </td>
    </tr>
    <tr>
        <td>
            Study Language:
        </td>
        <td>
            <?= $course->schoolCourseStudyLanguage->title ?>
        </td>
    </tr>
    <tr>
        <td>
            Country:
        </td>
        <td>
            <?= $school->country->title?>
        </td>
    </tr>

    <tr>
        <td>
            State:
        </td>
        <td>
            <?= $school->state->title?>
        </td>
    </tr>

    <tr>
        <td>
            City:
        </td>
        <td>
            <?= $school->city->title?>
        </td>
    </tr>

    <tr>
        <td>
            Required Level:
        </td>
        <td>
            <?=  SchoolCourse::ListLevels()[$course->required_level] ?>
        </td>
    </tr>

    <tr>
        <td>
            Study Time:
        </td>
        <td>
            <?= SchoolCourse::ListCourseTime()[$course->time_of_course] ?>
        </td>
    </tr>

    <tr>
        <td>
            Lessons/Week:
        </td>
        <td>
            <?= $course->lessons_per_week; ?>
        </td>
    </tr>
</table>

<?php endif;?>