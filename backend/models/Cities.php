<?php

namespace backend\models;

use webvimark\behaviors\multilanguage\MultiLanguageBehavior;
use webvimark\behaviors\multilanguage\MultiLanguageTrait;
use Yii;
use \backend\models\base\Cities as BaseCities;

/**
 * This is the model class for table "cities".
 */
class Cities extends BaseCities
{

    const SCENARIO_IMPORT= 'import';
    //for import
    public $county;
    public $title_ar;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['title'], 'unique'],
            [['state_id', 'title'], 'required'],
            [['state_id', 'sort'], 'integer'],
            [['state_id', 'sort'], 'integer','on'=>'import'],
            [['title'], 'string', 'max' => 50,'min'=>2],
            [['title_ar'],'safe'],
        ]);
    }


	
}
