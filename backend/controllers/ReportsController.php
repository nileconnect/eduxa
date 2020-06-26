<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use backend\models\School;
use backend\models\Schools;
use backend\models\University;
use backend\models\SchoolCourse;
use backend\models\search\UserSearch;
use backend\models\UniversityPrograms;
use backend\models\search\RequestsSearch;
use backend\models\UniversityProgramMajors;

/**
 * SchoolsController implements the CRUD actions for Schools model.
 */
class ReportsController extends BackendController
{

    public function actionGeneral()
    {
        $universityCount = University::find()->count();
        $universityProgramMajorsCount = UniversityProgramMajors::find()->count();
        $universityProgramsCount = UniversityPrograms::find()->count();
        $schoolsCount = Schools::find()->count();
        $coursesCount = SchoolCourse::find()->count();
        // users types count
        $studentsCount = count(User::findByRole('user'));
        $referralPersonCount = count(User::findByRole('referralPerson'));
        $referralCompanyCount = count(User::findByRole('referralCompany'));
        // return $universityCount;
        return $this->render('general',
            compact('universityCount', 'universityProgramMajorsCount', 'universityProgramsCount',
                'schoolsCount', 'studentsCount', 'referralPersonCount', 'referralCompanyCount', 'coursesCount'
            )
        );
    }

    public function actionUsers()
    {
        $searchModel = new UserSearch();
        $searchModel->report = true;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('users', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }

    public function actionRequests()
    {
        $searchModel = new RequestsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('requests', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}
