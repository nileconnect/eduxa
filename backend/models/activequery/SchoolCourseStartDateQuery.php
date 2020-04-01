<?php

namespace backend\models\activequery;

/**
 * This is the ActiveQuery class for [[\backend\models\activequery\SchoolCourseStartDate]].
 *
 * @see \backend\models\activequery\SchoolCourseStartDate
 */
class SchoolCourseStartDateQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \backend\models\activequery\SchoolCourseStartDate[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \backend\models\activequery\SchoolCourseStartDate|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
