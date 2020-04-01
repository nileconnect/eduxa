<?php

namespace backend\models\activequery;

/**
 * This is the ActiveQuery class for [[\backend\models\activequery\SchoolCourseSessionCost]].
 *
 * @see \backend\models\activequery\SchoolCourseSessionCost
 */
class SchoolCourseSessionCostQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \backend\models\activequery\SchoolCourseSessionCost[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \backend\models\activequery\SchoolCourseSessionCost|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
