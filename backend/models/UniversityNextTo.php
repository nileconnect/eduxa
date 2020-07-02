<?php

namespace backend\models;

use \backend\models\base\UniversityNextTo as BaseUniversityNextTo;

/**
 * This is the model class for table "university_next_to".
 */
class UniversityNextTo extends BaseUniversityNextTo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return
            [
            // [['university_id'], 'required'],
            // [['university_id'], 'integer'],
            [['created_at', 'updated_at'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 30, 'min' => 2],
            [['title'], 'unique'],

        ];
    }

}
