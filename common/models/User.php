<?php

namespace common\models;

use backend\models\Requests;
use common\commands\AddToTimelineCommand;
use common\models\query\UserQuery;
use phpDocumentor\Reflection\Types\Self_;
use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $email
 * @property string $auth_key
 * @property string $access_token
 * @property string $oauth_client
 * @property string $oauth_client_user_id
 * @property string $publicIdentity
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $logged_at
 * @property string $password write-only password
 *
 * @property \common\models\UserProfile $userProfile
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_NOT_ACTIVE = 1;
    const STATUS_ACTIVE = 2;
    const STATUS_DELETED = 3;

    const ROLE_MANAGER = 'manager';
    const ROLE_ADMINISTRATOR = 'administrator';


    const ROLE_USER = 'user';
    const ROLE_REFERRAL_PERSON = 'referralPerson';
    const ROLE_REFERRAL_COMPANY = 'referralCompany';
    const ROLE_UNIVERSITY_MANAGER = 'universityManager';

    const EVENT_AFTER_SIGNUP = 'afterSignup';
    const EVENT_AFTER_LOGIN = 'afterLogin';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::find()
            ->active()
            ->andWhere(['id' => $id])
            ->one();
    }

    /**
     * @return UserQuery
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::find()
            ->active()
            ->andWhere(['access_token' => $token])
            ->one();
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return User|array|null
     */
    public static function findByUsername($username)
    {
        return static::find()
            ->active()
            ->andWhere(['username' => $username])
            ->one();
    }

    /**
     * Finds user by username or email
     *
     * @param string $login
     * @return User|array|null
     */
    public static function findByLogin($login)
    {
        return static::find()
            ->active()
            ->andWhere(['or', ['username' => $login], ['email' => $login]])
            ->one();
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            'auth_key' => [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'auth_key'
                ],
                'value' => Yii::$app->getSecurity()->generateRandomString()
            ],
            'access_token' => [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'access_token'
                ],
                'value' => function () {
                    return Yii::$app->getSecurity()->generateRandomString(40);
                }
            ]
        ];
    }

    /**
     * @return array
     */
    public function scenarios()
    {
        return ArrayHelper::merge(
            parent::scenarios(),
            [
                'oauth_create' => [
                    'oauth_client', 'oauth_client_user_id', 'email', 'username', '!status'
                ]
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email'], 'unique'],
            ['status', 'default', 'value' => self::STATUS_NOT_ACTIVE],
            ['status', 'in', 'range' => array_keys(self::statuses())],
            [['username'], 'filter', 'filter' => '\yii\helpers\Html::encode']
        ];
    }

    /**
     * Returns user statuses list
     * @return array|mixed
     */
    public static function statuses()
    {
        return [
            self::STATUS_ACTIVE => Yii::t('common', 'Active'),
            self::STATUS_NOT_ACTIVE => Yii::t('common', 'Not Active'),
           // self::STATUS_DELETED => Yii::t('common', 'Deleted')
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('common', 'Username'),
            'email' => Yii::t('common', 'E-mail'),
            'status' => Yii::t('common', 'Status'),
            'access_token' => Yii::t('common', 'API access token'),
            'created_at' => Yii::t('common', 'Created at'),
            'updated_at' => Yii::t('common', 'Updated at'),
            'logged_at' => Yii::t('common', 'Last login'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfile()
    {
        return $this->hasOne(UserProfile::class, ['user_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->getSecurity()->generatePasswordHash($password);
    }

    /**
     * Creates user profile and application event
     * @param array $profileData
     */
    public function afterSignup(array $profileData = [],$role=User::ROLE_USER)
    {
        $this->refresh();
        Yii::$app->commandBus->handle(new AddToTimelineCommand([
            'category' => 'user',
            'event' => 'signup',
            'data' => [
                'public_identity' => $this->getPublicIdentity(),
                'user_id' => $this->getId(),
                'created_at' => $this->created_at
            ]
        ]));
        $profile = new UserProfile();
        $profile->locale = Yii::$app->language == 'en'? 'en-US': 'ar-AR';
        $profile->load($profileData, '');
        $this->link('userProfile', $profile);
        $this->trigger(self::EVENT_AFTER_SIGNUP);
        // Default role
        $auth = Yii::$app->authManager;
        $auth->assign($auth->getRole($role), $this->getId());
    }


    /**
     * @return string
     */
    public function getPublicIdentity()
    {
        if ($this->userProfile && $this->userProfile->getFullname()) {
            return $this->userProfile->getFullname();
        }
        if ($this->username) {
            return $this->username;
        }
        return $this->email;
    }

    public function getName()
    {
        if ($this->userProfile && $this->userProfile->getFullname()) {
            return $this->userProfile->getFullname();
        }
        if ($this->username) {
            return $this->username;
        }
        return $this->email;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }


    public static function findByRole($role)
    {
        return static::find()
            ->join('LEFT JOIN','{{%rbac_auth_assignment}}','{{%rbac_auth_assignment}}.user_id = id')
            ->where(['{{%rbac_auth_assignment}}.item_name' => $role])
            ->all();
    }


    public function getRolesList(){
        $roles_list= '';
        $roles =  $this->hasMany(RbacAuthAssignment::class, ['user_id' => 'id'])->all();

        foreach ($roles as $role) {
            $roles_list.= ' - '.$role->item_name ;
        }
        return $roles_list;
    }


    public static function ListRoles(){
        $data=[];
        $roles = Yii::$app->authManager->getRoles();
        foreach ($roles as $role){
            if($role->name != 'administrator'){
                $data[$role->name ]= $role->description;
            }

        }

        return $data ;
    }

    public static function  CountUsers($role,$andWhere='1=1'){

        return static::find()
            ->join('LEFT JOIN','{{%rbac_auth_assignment}}','{{%rbac_auth_assignment}}.user_id = id')
            ->join('LEFT JOIN','{{%user_profile}}','{{%user_profile}}.user_id = id')
            ->where(['{{%rbac_auth_assignment}}.item_name' => $role])
            ->andWhere($andWhere)
            ->count();
    }


    public static function UserRoleName($role){
        if($role == self::ROLE_MANAGER){
            return 'Manager';
        }else if($role == self::ROLE_USER){
            return 'Student';
        }else if($role == self::ROLE_REFERRAL_COMPANY){
            return 'Company Referral';
        }else if($role == self::ROLE_REFERRAL_PERSON){
            return 'Referral';
        }else if($role == self::ROLE_UNIVERSITY_MANAGER){
           return 'University Manager';
        }else{
            return '';
        }

    }


    public static function IsRole($userID,$role){
        $roles = ArrayHelper::getColumn( Yii::$app->authManager->getRolesByUser($userID ),'name');
        $currentRole=   array_keys($roles)[0];
        if($currentRole == $role){
            return true;
        }else{
            return false;
        }
    }

    public static function GetRequesterRole($userId){
        if(self::IsRole($userId,self::ROLE_REFERRAL_PERSON)){
            return  Requests::REQUEST_BY_REFERRAL_PERSON;
        }
        if(self::IsRole($userId,self::ROLE_REFERRAL_COMPANY)){
            return  Requests::REQUEST_BY_REFERRAL_COMPANY;
        }
        return  Requests::REQUEST_BY_STUDENT;
    }

    //relations

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentCertificates()
    {
        return $this->hasMany(\backend\models\StudentCertificate::className(), ['user_id' => 'id']);
    }

    public function getLastCertificate()
    {
        return $this->hasOne(\backend\models\StudentCertificate::className(), ['user_id' => 'id'])->orderBy('year DESC');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentTestResults()
    {
        return $this->hasMany(\backend\models\StudentTestResults::className(), ['user_id' => 'id']);
    }

}
