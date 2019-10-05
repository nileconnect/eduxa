<?php

namespace backend\models;

use Yii;
use \backend\models\base\Schools as BaseSchools;

/**
 * This is the model class for table "schools".
 */
class Schools extends BaseSchools
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['title'], 'required'],
            [['course_type', 'country_id', 'city_id', 'min_age', 'max_students_per_class', 'avg_students_per_class', 'lessons_per_week', 'created_by', 'updated_by'], 'integer'],
            [['details'], 'string'],
            [['hours_per_week', 'accomodation_fees', 'registeration_fees', 'study_books_fees', 'fees_per_week', 'discount', 'total_rating'], 'number'],
            [['title', 'location', 'lat', 'lng', 'image_base_url', 'image_path', 'start_every', 'study_time', 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['featured', 'status'], 'string', 'max' => 4]
        ]);
    }
	
}
