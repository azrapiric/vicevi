<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Joke;
use app\modules\admin\models\Person;


/**
 * JokeSearch represents the model behind the search form about `app\modules\admin\models\Joke`.
 */
class JokeSearch extends Joke
{
    /**
     * @inheritdoc
     */
    public $nick;
    public function rules()
    {
        return [
            [['id', 'views', 'active'], 'integer'],
            [['name', 'content', 'create_date'], 'safe'],
            [['nick'],'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query=Joke::find()->where(['<>', 'joke.active', 3]);
        $query->joinWith(['person']);

       //$query->andWhere(['<>', 'joke.active', 3]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


            $dataProvider->sort->attributes['nick'] = [
        // The tables are the ones our relation are configured to
        // in my case they are prefixed with "tbl_"
        'asc' => ['person.nick' => SORT_ASC],
        'desc' => ['person.nick' => SORT_DESC],
    ];
        
        
        
 
       if (!($this->load($params) && $this->validate())) {
        return $dataProvider;
    }
    
        /*$query->andFilterWhere(['id'=>$this->id]);
        $query->andFilterWhere(['person_id'=>$this->person_id]);*/
       

       $query->andFilterWhere([
            'id' => $this->id,
           // 'person_id'=> $this->person_id,
            'create_date' => $this->create_date,
            'views' => $this->views,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'content', $this->content])->andFilterWhere(['like','person_id',$this->person_id]);

             /*$query->joinWith(['person' => function ($q) {
        $q->where('person.nick LIKE "%' . $this->nick . '%"');
    }]);*/
        $query->andFilterWhere(['like', 'person.nick', $this->nick]);

        return $dataProvider;
    }

}
