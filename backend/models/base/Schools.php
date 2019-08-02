<?php

namespace backend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "schools".
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property integer $school_identity_number
 * @property integer $city_id
 * @property integer $district_id
 * @property integer $stage
 * @property integer $gender
 * @property integer $category
 * @property string $email
 * @property string $admin_name
 * @property string $admin_phone
 * @property string $admin_email
 * @property string $supervisor_phone
 * @property string $owner_name
 * @property string $owner_phone
 * @property string $owner_identity
 * @property integer $owner_gender
 * @property string $owner_email
 * @property string $nour_rep_phone
 * @property integer $owner_id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $lock
 * @property integer $deleted_by
 *
 * @property \backend\models\District $district
 * @property \backend\models\SchoolsProfile $schoolsProfile
 */
class Schools extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    private $_rt_softdelete;
    private $_rt_softrestore;

    public function __construct(){
        parent::__construct();
        $this->_rt_softdelete = [
            'deleted_by' => 1,
        ];
        $this->_rt_softrestore = [
            'deleted_by' => 0,
        ];
    }

    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'district',
            'schoolsProfile'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['school_identity_number', 'city_id', 'district_id', 'stage', 'owner_id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['title', 'slug', 'email', 'admin_name', 'admin_phone', 'admin_email', 'supervisor_phone', 'owner_name', 'owner_phone', 'owner_identity', 'owner_email', 'nour_rep_phone', 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['gender', 'category', 'owner_gender', 'lock'], 'string', 'max' => 4],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schools';
    }

    /**
     *
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock
     *
     */
    public function optimisticLock() {
        return 'lock';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'title' => Yii::t('backend', 'Title'),
            'slug' => Yii::t('backend', 'Slug'),
            'school_identity_number' => Yii::t('backend', 'School Identity Number'),
            'city_id' => Yii::t('backend', 'City ID'),
            'district_id' => Yii::t('backend', 'District ID'),
            'stage' => Yii::t('backend', 'Stage'),
            'gender' => Yii::t('backend', 'Gender'),
            'category' => Yii::t('backend', 'Category'),
            'email' => Yii::t('backend', 'Email'),
            'admin_name' => Yii::t('backend', 'Admin Name'),
            'admin_phone' => Yii::t('backend', 'Admin Phone'),
            'admin_email' => Yii::t('backend', 'Admin Email'),
            'supervisor_phone' => Yii::t('backend', 'Supervisor Phone'),
            'owner_name' => Yii::t('backend', 'Owner Name'),
            'owner_phone' => Yii::t('backend', 'Owner Phone'),
            'owner_identity' => Yii::t('backend', 'Owner Identity'),
            'owner_gender' => Yii::t('backend', 'Owner Gender'),
            'owner_email' => Yii::t('backend', 'Owner Email'),
            'nour_rep_phone' => Yii::t('backend', 'Nour Rep Phone'),
            'owner_id' => Yii::t('backend', 'Owner ID'),
            'lock' => Yii::t('backend', 'Lock'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(\backend\models\City::className(), ['id' => 'city_id']);
    }


    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(\backend\models\District::className(), ['id' => 'district_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchoolsProfile()
    {
        return $this->hasOne(\backend\models\SchoolsProfile::className(), ['schools_id' => 'id']);
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
        ];
    }

    /**
     * The following code shows how to apply a default condition for all queries:
     *
     * ```php
     * class Customer extends ActiveRecord
     * {
     *     public static function find()
     *     {
     *         return parent::find()->where(['deleted' => false]);
     *     }
     * }
     *
     * // Use andWhere()/orWhere() to apply the default condition
     * // SELECT FROM customer WHERE `deleted`=:deleted AND age>30
     * $customers = Customer::find()->andWhere('age>30')->all();
     *
     * // Use where() to ignore the default condition
     * // SELECT FROM customer WHERE age>30
     * $customers = Customer::find()->where('age>30')->all();
     * ```
     */

    /**
     * @inheritdoc
     * @return \backend\models\activequery\SchoolsQuery the active query used by this AR class.
     */
    public static function find()
    {
        $query = new \backend\models\activequery\SchoolsQuery(get_called_class());
        return $query->where(['schools.deleted_by' => 0]);
    }
}
