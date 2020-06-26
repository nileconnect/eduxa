<?php

use common\models\UserProfile;
use kartik\export\ExportMenu;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\Html;

$url = \yii\helpers\Url::to(['/helper/users-list']);

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users Report';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <?php echo $this->render('_UserSearch', ['model' => $searchModel]); ?>

    <?php

if (in_array($searchModel->user_role, ['referralCompany', 'referralPerson'])) {
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'header' => Yii::t('backend', 'Full Name'),
            'attribute' => 'id',
            'format' => 'raw',
            'value' => function ($model) {
                return Html::a($model->userProfile['fullName'], ['/user/view?id=' . $model->id], ['target' => '_self']);
            },
        ],
        'email:email',
        [
            'header' => Yii::t('backend', 'Gender'),
            'attribute' => 'gender',
            'value' => function ($model) {
                return UserProfile::ListGender()[$model->userProfile->gender];
            },
        ],
        [
            'header' => Yii::t('backend', 'Mobile Number'),
            'attribute' => 'mobile',
            'value' => function ($model) {
                return $model->userProfile->mobile;
            },
        ],
        [
            'header' => Yii::t('backend', 'Telephone Number'),
            'attribute' => 'telephone_no',
            'value' => function ($model) {
                return $model->userProfile->telephone_no;
            },
        ],
        // [
        //     'header' => Yii::t('backend', 'Nationality'),
        //     'attribute' => 'nationality',
        //     'value' => function ($model) {
        //         return $model->userProfile->nationality;
        //     },
        // ],
        [
            'header' => Yii::t('backend', 'Country'),
            'attribute' => 'country_id',
            'value' => function ($model) {
                return $model->userProfile->country->title;
            },
        ],
        [
            'header' => Yii::t('backend', 'State'),
            'attribute' => 'state_id',
            'value' => function ($model) {
                return $model->userProfile->state->title;
            },
        ],
        [
            'header' => Yii::t('backend', 'City'),
            'attribute' => 'city_id',
            'value' => function ($model) {
                return $model->userProfile->city->title;
            },
        ],

        [
            'header' => Yii::t('backend', 'Job Title'),
            'attribute' => 'job_title',
            'value' => function ($model) {
                return $model->userProfile->job_title;
            },
        ],
        [
            'header' => Yii::t('backend', 'Company Name'),
            'attribute' => 'company_name',
            'value' => function ($model) {
                return $model->userProfile->company_name;
            },
        ],
        [
            'header' => Yii::t('backend', 'Expected NO Of Students'),
            'attribute' => 'expected_no_of_students',
            'value' => function ($model) {
                return $model->userProfile->expected_no_of_students;
            },
        ]
    ];
} else {

    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'header' => Yii::t('backend', 'Full Name'),
            'attribute' => 'id',
            'format' => 'raw',
            'value' => function ($model) {
                return Html::a($model->userProfile['fullName'], ['/user/view?id=' . $model->id], ['target' => '_self']);
            },
        ],
        'email:email',
        [
            'header' => Yii::t('backend', 'Gender'),
            'attribute' => 'gender',
            'value' => function ($model) {
                return UserProfile::ListGender()[$model->userProfile->gender];
            },
        ],
        [
            'header' => Yii::t('backend', 'Mobile Number'),
            'attribute' => 'mobile',
            'value' => function ($model) {
                return $model->userProfile->mobile;
            },
        ],
        [
            'header' => Yii::t('backend', 'Nationality'),
            'attribute' => 'nationality',
            'value' => function ($model) {
                return $model->userProfile->nationality;
            },
        ],
        [
            'header' => Yii::t('backend', 'Country'),
            'attribute' => 'country_id',
            'value' => function ($model) {
                return $model->userProfile->country->title;
            },
        ],
        [
            'header' => Yii::t('backend', 'State'),
            'attribute' => 'state_id',
            'value' => function ($model) {
                return $model->userProfile->state->title;
            },
        ],
        [
            'header' => Yii::t('backend', 'City'),
            'attribute' => 'city_id',
            'value' => function ($model) {
                return $model->userProfile->city->title;
            },
        ],
        [
            'header' => Yii::t('backend', 'Interested University'),
            'attribute' => 'interested_in_university',
            'value' => function ($model) {
                return $model->userProfile->interestedUniversity->title;
            },
        ],
        [
            'header' => Yii::t('backend', 'Interested School'),
            'attribute' => 'interested_in_schools',
            'value' => function ($model) {
                return $model->userProfile->interestedSchool->title;
            },
        ],
        [
            'header' => Yii::t('backend', 'Best Way Of Communtication'),
            'attribute' => 'communtication_channel',
            'value' => function ($model) {
                return UserProfile::ListCommunicateChannels()[$model->userProfile->communtication_channel];
            },
        ],
        [
            'header' => Yii::t('backend', 'Last Education Qualification'),
            'attribute' => 'last_education_qualification',
            'value' => function ($model) {
                return $model->lastCertificate->certificate_name;
            },
        ],
        [
            'header' => Yii::t('backend', 'Year Of Graduation'),
            'attribute' => 'Year_Of_Graduation',
            'value' => function ($model) {
                return $model->lastCertificate->year;
            },
        ],
        [
            'header' => Yii::t('backend', 'Grade'),
            'attribute' => 'Grade',
            'value' => function ($model) {
                return $model->lastCertificate->grade;
            },
        ],
    ];
}

// Renders a export dropdown menu
echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
]);

echo GridView::widget([
    'dataProvider' => $dataProvider,
    // 'filterModel' => $searchModel,
    'options' => [
        'class' => 'grid-view table-responsive',
    ],
    'columns' => $gridColumns,
]);?>

</div>

