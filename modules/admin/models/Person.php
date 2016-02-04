<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property integer $id
 * @property string $nick
 * @property string $email
 * @property string $password
 * @property integer $role
 * @property integer $active
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nick', 'email', 'password', 'role', 'active'], 'required'],
            [['role', 'active'], 'integer'],
            [['nick', 'email'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nick' => Yii::t('app', 'Nick'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
            'role' => Yii::t('app', 'Role'),
            'active' => Yii::t('app', 'Banned'),
        ];
    }


        public function toggleActive(){
            if($this->active=='1'){
                $this->active='0';
            }else{
                $this->active='1';
           }

            $this->save(false);
                
        }

}
