<?php

namespace common\modules\product\models\search;

use common\modules\product\models\SuperCategory;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SuperCategorySearch represents the model behind the search form of `backend\models\SuperCategory`.
 */
class SuperCategorySearch extends SuperCategory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name','parent_id'], 'safe'],
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
        $query = SuperCategory::find()->joinWith('translation');

        // Add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // Grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id, // Explicitly specify the table alias for id
//            'parent_id' => $this->parent_id, // Specify table alias for parent_id
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]); // Specify table alias for name
        $query->joinWith(['parent as parentCategory']);
        $query->andFilterWhere(['like', 'super_category_lang.name', $this->parent_id]); // Specify table alias for parent_id if filtering by translation name

        return $dataProvider;
    }

}
