<?php

namespace app\modules\admin\models;

use Yii;
use app\modules\admin\models\Person;


/**
 * This is the model class for table "joke".
 *
 * @property integer $id
 * @property string $name
 * @property string $content
 * @property string $create_date
 * @property integer $views
 * @property integer $active
 *
 * @property JokeCategory[] $jokeCategories
 */
class Joke extends \yii\db\ActiveRecord
{
    public $category_ids=[];

    public $nick;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'joke';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'content', 'create_date','views', 'active_from'], 'required','message'=>'Field could not be empty'],
           // [['content'],],
            [['create_date'], 'date','format'=>'yyyy-M-d H:i:s'],
            //[['views', 'active'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['category_ids','create_date'],'safe'],
            [['active_to'],'compare','compareAttribute'=>'active_from','operator'=>'>','skipOnEmpty'=>true]

        
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'content' => Yii::t('app', 'Content'),
            'create_date' => Yii::t('app', 'Create Date'),
            'views' => Yii::t('app', 'Views'),
            'active' => Yii::t('app', 'Active'),
            'category_ids'=>Yii::t('app','Categories'),
            'person_id' => Yii::t('app', 'User')
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */


    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['id' => 'category_id'])
        ->viaTable('joke_category', ['joke_id' => 'id']);
    }

    public function saveCategories(){
        foreach($this->categories as $category){//$this->categories mi vraca listu objekata
            $i=array_search($category->id, $this->category_ids);//trazi konkretan int u nizu intova
            if($i!==false){//vraca index gdje se nalazi ili ako ga nema false

                unset($this->category_ids[$i]);//brise na i-tom mjestu caketogri id
            }
        }
        foreach ($this->category_ids as $value) {//prolazim kroz listu zeljenih ideva
            $category=Category::findOne($value);//nadjem objekat iz tabele na mjestu value
            
            $this->link('categories',$category);//relacija i objekat
        }   
     }

     public function deleteCategories(){
        foreach($this->categories as $category){//prodji categorijama(bazom) i za svaku kao objekat
            if(array_search($category->id, $this->category_ids) === false){//ako ne nadjes njen id u listi svih onda unlinkaj
                $this->unlink('categories',$category,true);
            }
        }
     }

     public function syncCategories(){
        foreach ($this->categories as $value) {
            $this->category_ids[]=$value->id;//u moju listu category ideva dodaj mi cekirane
        }
     }

     public function getPerson(){
        return $this->hasOne(Person::className(), ['id' => 'person_id']);

     }
     
        public function toggleActive(){
            if($this->active=='1'){
                $this->active='2';
            }else{
                $this->active='1';
           }

            $this->save(false);
                
        }
}
 