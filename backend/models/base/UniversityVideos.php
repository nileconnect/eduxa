<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "university_videos".
 *
 * @property integer $id
 * @property integer $university_id
 * @property string $path
 * @property string $base_url
 * @property string $type
 * @property integer $size
 * @property string $name
 * @property integer $created_at
 * @property integer $order
 *
 * @property \backend\models\University $university
 */
class UniversityVideos extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'university'
        ];
    }

    /**
     * @inheritdoc
     */


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'university_videos';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'university_id' => Yii::t('backend', 'University ID'),
            'path' => Yii::t('backend', 'Path'),
            'base_url' => Yii::t('backend', 'Base Url'),
            'type' => Yii::t('backend', 'Type'),
            'size' => Yii::t('backend', 'Size'),
            'name' => Yii::t('backend', 'Name'),
            'order' => Yii::t('backend', 'Order'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUniversity()
    {
        return $this->hasOne(\backend\models\University::className(), ['id' => 'university_id']);
    }
    

    /**
     * @inheritdoc
     * @return \backend\models\activequery\UniversityVideosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\activequery\UniversityVideosQuery(get_called_class());
    }
}
