<?php

namespace backend\models;

use Yii;
use \backend\models\base\UniversityProgStartdate as BaseUniversityProgStartdate;

/**
 * This is the model class for table "university_prog_startdate".
 */
class UniversityProgStartdate extends BaseUniversityProgStartdate
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return 
         [
            [['university_prog_id'], 'integer'],
            ['m_1', 'checkAtLeastOneChoose'],
            [['m_1', 'm_2', 'm_3', 'm_4', 'm_5', 'm_6', 'm_7', 'm_8', 'm_9', 'm_10', 'm_11', 'm_12'], 'string', 'max' => 4],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'string', 'max' => 255]
        ];
    }

    public function checkAtLeastOneChoose($attribute_name, $params)
    {
        if (!$this->m_1 && !$this->m_2 && !$this->m_3 && !$this->m_4 && !$this->m_5 && !$this->m_6 && !$this->m_7 && !$this->m_8 && !$this->m_9 && !$this->m_10 && !$this->m_11 && !$this->m_12 ) {
            
            $this->addError('m1', Yii::t('user', 'At least 1 of the Start Dates must be filled up properly'));
            return false;
        }

        return true;
    }
	
}
