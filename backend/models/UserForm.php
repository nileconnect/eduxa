<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use yii\base\Exception;
use yii\helpers\ArrayHelper;
use kartik\password\StrengthValidator;

/**
 * Create user form
 */
class UserForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $status;
    public $roles;

    private $model;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //['username', 'filter', 'filter' => 'trim'],
            //['username', 'required'],
//            ['username', 'unique', 'targetClass' => User::class, 'filter' => function ($query) {
//                if (!$this->getModel()->isNewRecord) {
//                    $query->andWhere(['not', ['id' => $this->getModel()->id]]);
//                }
//            }],
   //         ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => User::class, 'filter' => function ($query) {
                if (!$this->getModel()->isNewRecord) {
                    $query->andWhere(['not', ['id' => $this->getModel()->id]]);
                }
            }],

            // ['password', 'required', 'on' => 'create'],
            [['password'], StrengthValidator::className(), 'preset'=>'normal',
                'minError'=> \Yii::t('backend','password should contain at least 8 characters'),
                'lowerError'=> \Yii::t('backend','password should contain at least one lower case character'),
                'upperError'=> \Yii::t('backend','password should contain at least one uppercase character'),
                'digitError'=> \Yii::t('backend','password should contain at least one numeric  character'),
            ],
            // ['password', 'string', 'min' => 8 ,'max'=>15],

            [['status'], 'integer'],
            ['roles', 'string'],

//            [['roles'], 'each',
//                'rule' => ['in', 'range' => ArrayHelper::getColumn(
//                    Yii::$app->authManager->getRoles(),
//                    'name'
//                )]
//            ],
        ];
    }

    /**
     * @return User
     */
    public function getModel()
    {
        if (!$this->model) {
            $this->model = new User();
        }
        return $this->model;
    }

    /**
     * @param User $model
     * @return mixed
     */
    public function setModel($model)
    {
        $this->username = $model->email;
        $this->email = $model->email;
        $this->status = $model->status;
        $this->model = $model;
        $this->roles = ArrayHelper::getColumn(
            Yii::$app->authManager->getRolesByUser($model->getId()),
            'name'
        );
        return $this->model;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('common', 'Username'),
            'email' => Yii::t('common', 'Email'),
            'status' => Yii::t('common', 'Status'),
            'password' => Yii::t('common', 'Password'),
            'roles' => Yii::t('common', 'Roles')
        ];
    }

    /**
     * Signs user up.
     * @return User|null the saved model or null if saving fails
     * @throws Exception
     */
    public function save($role= null)
    {
        if ($this->validate()) {
            $model = $this->getModel();
            $isNewRecord = $model->getIsNewRecord();
            $model->username = $this->email;
            $model->email = $this->email;
            $model->status = $this->status;
            if ($this->password) {
                $model->setPassword($this->password);
            }
            if (!$model->save()) {
                throw new Exception('Model not saved');
            }
            if ($isNewRecord) {
                $model->afterSignup();
            }
            $auth = Yii::$app->authManager;
            $auth->revokeAll($model->getId());
            if($role){
                $auth->assign( $auth->getRole($role), $model->getId());

            }else{
                $auth->assign( $auth->getRole($this->roles) , $model->getId());

            }

//            if ($this->roles && is_array($this->roles)) {
//                foreach ($this->roles as $role) {
//                    $auth->assign($auth->getRole($role), $model->getId());
//                }
//            }

            return !$model->hasErrors();
        }
        return null;
    }
}
