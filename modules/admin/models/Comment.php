<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property integer $id
 * @property string $content
 * @property integer $user_id
 * @property string $datetime
 * @property integer $joke_id
 * @property integer $aprooved
 * @property integer $active
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $nick;
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content','datetime','aprooved'], 'required'],
            [['content'], 'string'],
            [['user_id', 'joke_id', 'aprooved', 'active'], 'integer'],
            [['datetime'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'content' => Yii::t('app', 'Content'),
            'user_id' => Yii::t('app', 'User ID'),
            'datetime' => Yii::t('app', 'Datetime'),
            'joke_id' => Yii::t('app', 'Joke ID'),
            'aprooved' => Yii::t('app', 'Aprooved'),
            'active' => Yii::t('app', 'Active'),
        ];
    }
    public function getJoke($joke_id)
    {  
        return Joke::find()->where(['id' => $joke_id])->one();
    }

    public function getUser($user_id)
    {
        return Person::find()->where(['id'=>$user_id])->one();
    }

         public function getPerson(){
        return $this->hasOne(Person::className(), ['id' => 'user_id']);

     }

            public function toggleActive(){
            if($this->aprooved=='1'){
                $this->aprooved='0';
            }else{
                $this->aprooved='1';
           }

            $this->save(false);
                
        }
}
