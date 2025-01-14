<?php

namespace common\modules\blog\models\search;

use common\modules\blog\models\BlogTags;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * BlogTagsSearch represents the model behind the search form of `backend\models\BlogTags`.
 */
class BlogTagsSearch extends BlogTags
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blog_id', 'tags_id'], 'safe'],
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
        $query = $params['query'] ?? BlogTags::find();

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
//            'blog_id' => $this->blog_id,
//            'tags_id' => $this->tags_id,
        ]);

        $query->joinWith(['blog.translations','tags.translations']);
        $query->andFilterWhere(['like', 'blog_lang.title', $this->blog_id]);
        $query->andFilterWhere(['like', 'tags_lang.name', $this->tags_id]);
        return $dataProvider;
    }
}
