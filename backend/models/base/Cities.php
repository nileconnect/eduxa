<?php

namespace backend\models\base;

use webvimark\behaviors\multilanguage\MultiLanguageBehavior;
use webvimark\behaviors\multilanguage\MultiLanguageTrait;
use Yii;

/**
 * This is the base model class for table "cities".
 *
 * @property integer $id
 * @property integer $state_id
 * @property string $title
 * @property integer $sort
 *
 * @property \backend\models\State $state
 */
class Cities extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    use MultiLanguageTrait;
    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'state'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['state_id', 'title'], 'required'],
            [['state_id', 'sort'], 'integer'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cities';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'state_id' => Yii::t('backend', 'State ID'),
            'title' => Yii::t('backend', 'Title'),
            'sort' => Yii::t('backend', 'Sort'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(\backend\models\State::className(), ['id' => 'state_id']);
    }
    

    /**
     * @inheritdoc
     * @return \backend\models\activequery\CitiesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\activequery\CitiesQuery(get_called_class());
    }

    public function behaviors() {
        return [

            'mlBehavior'=>[
                'class'    => MultiLanguageBehavior::className(),
                'mlConfig' => [
                    'db_table'         => 'translations_with_text',
                    'attributes'       => ['title'],
                    'admin_routes'     => [
                        'cities/update',
                        'cities/index',
                        'cities/create',
                    ],
                ],
            ],
        ];
    }
}
