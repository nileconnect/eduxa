<?php

namespace backend\models\activequery;

/**
 * This is the ActiveQuery class for [[\backend\models\activequery\SchoolCourse]].
 *
 * @see \backend\models\activequery\SchoolCourse
 */
class SchoolCourseQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \backend\models\activequery\SchoolCourse[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \backend\models\activequery\SchoolCourse|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
