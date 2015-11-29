<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SaidComment;

/**
 * SaidCommentSearch represents the model behind the search form about `common\models\SaidComment`.
 */
class SaidCommentSearch extends SaidComment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'said_id', 'status', 'user_id', 'to_user_id', 'created_at'], 'integer'],
            [['comment'], 'safe'],
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
        $query = SaidComment::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'said_id' => $this->said_id,
            'status' => $this->status,
            'user_id' => $this->user_id,
            'to_user_id' => $this->to_user_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
