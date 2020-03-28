<?php

namespace backend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "schools".
 *
 * @property integer $id
 * @property string $title
 * @property integer $course_type
 * @property string $details
 * @property integer $featured
 * @property string $location
 * @property string $lat
 * @property string $lng
 * @property string $image_base_url
 * @property string $image_path
 * @property integer $country_id
 * @property integer $city_id
 * @property integer $min_age
 * @property string $start_every
 * @property string $study_time
 * @property integer $max_students_per_class
 * @property integer $avg_students_per_class
 * @property integer $lessons_per_week
 * @property double $hours_per_week
 * @property double $accomodation_fees
 * @property double $registeration_fees
 * @property double $study_books_fees
 * @property double $fees_per_week
 * @property double $discount
 * @property integer $no_of_ratings
 * @property double $total_rating
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property \backend\models\SchoolAccomodation[] $schoolAccomodations
 * @property \backend\models\SchoolAirportPickup[] $schoolAirportPickups
 * @property \backend\models\SchoolCourse[] $schoolCourses
 * @property \backend\models\SchoolPhotos[] $schoolPhotos
 * @property \backend\models\SchoolRating[] $schoolRatings
 * @property \backend\models\SchoolVideos[] $schoolVideos
 */

class SchoolsV extends Schools
{
    use \mootensai\relation\RelationTrait;


    public function relationNames()
    {
        return [
            'schoolVideos',
        ];
    }

}
