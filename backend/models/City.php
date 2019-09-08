<?php

namespace backend\models;

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
class City extends \yii\db\ActiveRecord {

   // use \webvimark\behaviors\multilanguage\MultiLanguageTrait;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'city';
    }

    public function behaviors() {
        return [
//            'slug' => [
//                'class' => 'Zelenin\yii\behaviors\Slug',
//                'slugAttribute' => 'slug',
//                'attribute' => 'title',
//                // optional params
//                'ensureUnique' => true,
//                //'replacement' => '-',
//                'lowercase' => true,
//                'immutable' => true,
//                // If intl extension is enabled, see http://userguide.icu-project.org/transforms/general.
//                // 'transliterateOptions' => 'Russian-Latin/BGN; Any-Latin; Latin-ASCII; NFD; [:Nonspacing Mark:] Remove; NFC;'
//            ],
//            'mlBehavior' => [
//                'class' => \webvimark\behaviors\multilanguage\MultiLanguageBehavior::className(),
//                'mlConfig' => [
//                    'db_table' => 'translations_with_string',
//                    'attributes' => ['title', 'slug'],
//                    'admin_routes' => [
//                        'city/create',
//                        'CITY/update'
//                    ],
//                ],
//            ],
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            // Place your custom code here
            $string = $this->slug;
            //Lower case everything
            $string = strtolower($string);
            //Make alphanumeric (removes all other characters)
            // $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
            //Clean up multiple dashes or whitespaces
            $string = preg_replace("/[\s-]+/", " ", $string);
            //Convert whitespaces and underscore to dash
            $string = preg_replace("/[\s_]/", "-", $string);
            $this->slug =$string;

            return true;
        } else {
            return false;
        }
    }


    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['title'], 'unique'],
            [['country_id','sort'], 'integer'],
            [['meta_description','sort'],'safe'],
            [['title', 'slug'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Name'),
            'sort' => Yii::t('app', 'City Sort'),
            'country_id' => Yii::t('app', 'Country ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
  /*
    public function getDistricts() {
        return $this->hasMany(District::className(), ['city_id' => 'id']);
    }

    public static function getAll() {
        return \yii\helpers\ArrayHelper::map(static::find()->orderBy(['sort'=>SORT_ASC])->all(), 'id', 'title');
    }

    public static function getCityDistricts($city_id) {
        return \yii\helpers\ArrayHelper::map(District::find()->where(['city_id'=>$city_id])->all(), 'id', 'title');
    }
*/
    public static function getAllSlugs() {
        return \yii\helpers\ArrayHelper::map(static::find()->orderBy(['sort'=>SORT_ASC])->all(), 'slug', 'title');
    }


    public static function AllSlugs() {

        return static::find()->orderBy(['sort'=>SORT_ASC])->all() ; //\yii\helpers\ArrayHelper::map(static::find()->orderBy(['sort'=>SORT_ASC])->all(), 'slug', 'name');
    }

}
