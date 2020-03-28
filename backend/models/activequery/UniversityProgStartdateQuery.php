<?php

namespace backend\models\activequery;

/**
 * This is the ActiveQuery class for [[\backend\models\activequery\UniversityProgStartdate]].
 *
 * @see \backend\models\activequery\UniversityProgStartdate
 */
class UniversityProgStartdateQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \backend\models\activequery\UniversityProgStartdate[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \backend\models\activequery\UniversityProgStartdate|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
