<?php

namespace backend\models;

use Yii;
use \backend\models\base\Requests as BaseRequests;

/**
 * This is the model class for table "requests".
 */
class Requests extends BaseRequests
{
    const STATUS_PENDING = 0;
    const STATUS_UNDER_PROCESS = 1;
    const STATUS_APPROVED = 2;
    const STATUS_FINISHED = 3;
    const STATUS_CANCELED = 4;

    const REQUEST_BY_STUDENT =0;
    const REQUEST_BY_REFERRAL_COMPANY =1;
    const REQUEST_BY_REFERRAL_PERSON =2;

    const MODEL_NAME_COURSE = 0;
    const MODEL_NAME_PROGRAM = 1;


    public static  function ListStatus(){
        return [
            self::STATUS_PENDING => 'Pending',
            self::STATUS_UNDER_PROCESS => "Under Process",
            self::STATUS_APPROVED => "Approved",
            self::STATUS_FINISHED => "Finished",
            self::STATUS_CANCELED => "Canceled",
        ];
    }

    public static  function ListRequestBy(){
        return [
            self::REQUEST_BY_STUDENT => 'Student',
            self::REQUEST_BY_REFERRAL_COMPANY => "Referral Company",
            self::REQUEST_BY_REFERRAL_PERSON => "Referral Person",

        ];
    }

    public static  function ListModelNames(){
        return [
            self::MODEL_NAME_COURSE => 'School Course',
            self::MODEL_NAME_PROGRAM => "Programe",
        ];
    }



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model_id', 'requester_id', 'status'], 'required'],
            [['model_id', 'model_parent_id', 'student_id', 'requester_id', 'student_country_id', 'student_city_id', 'student_nationality_id',
                'request_by_role','number_of_weeks','status','model_name','student_gender'], 'integer'],
            [['request_notes', 'admin_notes'], 'string'],
            [['accomodation_option_cost'], 'number'],
            [['student_first_name', 'student_last_name', 'student_email', 'student_mobile', 'accomodation_option', 'airport_pickup', 'airport_pickup_cost', 'course_start_date', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'string', 'max' => 255]
        ];
    }




}
