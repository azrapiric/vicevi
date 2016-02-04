<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $category
 * @property string $image
 * @property integer $active
 *
 * @property JokeCategory[] $jokeCategories
 */
class Category extends \yii\db\ActiveRecord
{   public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category', 'image', 'active'], 'required'],
            [['active'], 'integer'],
            [['category'], 'string', 'max' => 100],
            [['image'], 'string', 'max' => 255],
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category' => Yii::t('app', 'Category'),
            'image' => Yii::t('app', 'Image'),
            'active' => Yii::t('app', 'Active'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJokes()
    {
        return $this->hasMany(Joke::className(), ['id' => 'joke_id'])
        ->viaTable('joke_category', ['category_id' => 'id']);
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
