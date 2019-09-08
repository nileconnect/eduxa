<?php

namespace backend\models\activequery;

/**
 * This is the ActiveQuery class for [[\backend\models\activequery\UniversityPrograms]].
 *
 * @see \backend\models\activequery\UniversityPrograms
 */
class UniversityProgramsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \backend\models\activequery\UniversityPrograms[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \backend\models\activequery\UniversityPrograms|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
