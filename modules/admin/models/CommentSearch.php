<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Comment;

/**
 * CommentSearch represents the model behind the search form about `app\modules\admin\models\Comment`.
 */
class CommentSearch extends Comment
{
    /**
     * @inheritdoc
     */
    public $nick;
    public function rules()
    {
        return [
            [['id', 'user_id', 'joke_id', 'aprooved', 'active'], 'integer'],
            [['content', 'datetime','nick'], 'safe'],
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
        $query = Comment::find();
         $query->joinWith(['person']);

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

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'datetime' => $this->datetime,
            'joke_id' => $this->joke_id,
            'aprooved' => $this->aprooved,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content])->andFilterWhere(['like','user_id',$this->user_id]);

          $query->andFilterWhere(['like', 'person.nick', $this->nick]);

        return $dataProvider;
    }
}
