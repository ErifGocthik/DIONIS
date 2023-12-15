<?php

namespace app\modules\admin;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Events;

/**
 * EventsSearch represents the model behind the search form of `app\models\Events`.
 */
class EventsSearch extends Events
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'age_id', 'style_id', 'count_of_tickets', 'price'], 'integer'],
            [['title', 'description', 'image', 'author', 'director', 'duration', 'idea', 'street', 'start'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Events::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'age_id' => $this->age_id,
            'start' => $this->start,
            'style_id' => $this->style_id,
            'count_of_tickets' => $this->count_of_tickets,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'director', $this->director])
            ->andFilterWhere(['like', 'duration', $this->duration])
            ->andFilterWhere(['like', 'idea', $this->idea])
            ->andFilterWhere(['like', 'street', $this->street]);

        return $dataProvider;
    }
}
