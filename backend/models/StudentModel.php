<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;



class StudentModel extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
     * This function helps \mootensai\relation\RelationTrait runs faster
     * @return array relation names of this model
     */
    public function relationNames()
    {
        return [

            'studentCertificates',
            'studentTestResults',

        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['auth_key', 'access_token', 'password_hash', 'email'], 'required'],
            [['status', 'created_at', 'updated_at', 'logged_at'], 'integer'],
            [['username', 'auth_key'], 'string', 'max' => 32],
            [['access_token'], 'string', 'max' => 40],
            [['password_hash', 'oauth_client', 'oauth_client_user_id', 'email'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'username' => Yii::t('backend', 'Username'),
            'auth_key' => Yii::t('backend', 'Auth Key'),
            'access_token' => Yii::t('backend', 'Access Token'),
            'password_hash' => Yii::t('backend', 'Password Hash'),
            'oauth_client' => Yii::t('backend', 'Oauth Client'),
            'oauth_client_user_id' => Yii::t('backend', 'Oauth Client User ID'),
            'email' => Yii::t('backend', 'Email'),
            'status' => Yii::t('backend', 'Status'),
            'logged_at' => Yii::t('backend', 'Logged At'),
        ];
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentCertificates()
    {
        return $this->hasMany(\backend\models\StudentCertificate::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentTestResults()
    {
        return $this->hasMany(\backend\models\StudentTestResults::className(), ['user_id' => 'id']);
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
        ];
    }


    /**
     * @inheritdoc
     * @return \backend\models\activequery\UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\activequery\UserQuery(get_called_class());
    }
}
?>