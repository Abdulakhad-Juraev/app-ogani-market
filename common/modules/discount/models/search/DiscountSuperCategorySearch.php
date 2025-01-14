<?php

namespace common\modules\discount\models\search;

use common\modules\discount\models\DiscountSuperCategory;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * DiscountSuperCategorySearch represents the model behind the search form of `backend\models\DiscountSuperCategory`.
 */
class DiscountSuperCategorySearch extends DiscountSuperCategory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['discount_id', 'super_category_id'], 'safe'],
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
        $query = $params['query'] ?? DiscountSuperCategory::find();

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
//            'discount_id' => $this->discount_id,
//            'super_category_id' => $this->super_category_id,
        ]);
        $query->joinWith(['discount','superCategory.translations']);
        $query->andFilterWhere(['like', 'discount.name', $this->discount_id]);
        $query->andFilterWhere(['like', 'super_category_lang.name', $this->super_category_id]);
        return $dataProvider;
    }
}
