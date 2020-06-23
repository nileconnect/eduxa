<?php

namespace backend\models;

use webvimark\behaviors\multilanguage\MultiLanguageBehavior;
use webvimark\behaviors\multilanguage\MultiLanguageTrait;
use Yii;

/**
 * This is the model class for table "ya_city".
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property integer $country_id
 *
 */
class State extends \yii\db\ActiveRecord {

    use MultiLanguageTrait;

    public $title_ar;
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'state';
    }

    public function behaviors() {
        return [

            'mlBehavior'=>[
                'class'    => MultiLanguageBehavior::className(),
                'mlConfig' => [
                    'db_table'         => 'translations_with_text',
                    'attributes'       => ['title'],
                    'admin_routes'     => [
                        'states/update',
                        'states/index',
                        'states/view',
                    ],
                ],
            ],
        ];
    }


    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['title'], 'required'],
            [['title'], 'unique'],
            [['country_id','sort'], 'integer'],
            [['meta_description','sort','title_ar'],'safe'],
            [['title','slug'], 'string', 'max' => 50,'min'=>2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'State Name'),
            'sort' => Yii::t('app', 'State Sort'),
            'country_id' => Yii::t('app', 'Country'),
        ];
    }

}
