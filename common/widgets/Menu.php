<?php

namespace common\widgets;

use common\widgets\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

class Menu extends SoftMenu
{
    public $options = [
        'class' => 'nav nav-pills nav-sidebar flex-column nav-child-indent',
        'data-widget' => 'treeview',
        'role' => 'menu',
        'data-accordion' => 'false',
    ];

    public $itemOptions = ['class' => 'nav-item'];

    public $linkTemplate = '<a href="{url}" class="nav-link">{label}</a>';
    public $activeLinkTemplate = '<a href="{url}" class="nav-link active">{label}</a>';
    public $badgeClass = 'success';

    public $subMenuOptions = ['class' => 'nav nav-treeview'];

    public $legacy = true;
    public $childIndent = true;

    public function init()
    {
        if ($this->legacy) {
            Html::addCssClass($this->options, 'nav-legacy');
        }

        if ($this->childIndent) {
            Html::addCssClass($this->options, 'nav-child-indent');
        }

        parent::init();
    }

    /**
     * @param array $item  the menu item to be rendered.
     * @return string
     * @throws \Exception
     */
    protected function renderItem($item)
    {
        $linkTemplate = $item['active'] ? $this->activeLinkTemplate : $this->linkTemplate;
        $replacements = [
            '{label}' => $this->renderLabel($item),
            '{url}' => isset($item['url']) ? Url::to($item['url']) : 'javascript:void(0);',
        ];

        return strtr($linkTemplate, $replacements);
    }

    /**
     * @param array $items
     * @return string
     * @throws \Exception
     */
    protected function renderItems($items)
    {

        $lines = [];
        foreach ($items as $i => $item) {

            $options = array_merge($this->itemOptions, ArrayHelper::getValue($item, 'options', []));

            $tag = ArrayHelper::remove($options, 'tag', 'li');

            $menu = $this->renderItem($item);

            if (!empty($item['items'])) {

                $subMenuOptions = $this->subMenuOptions;
                $subMenuItems = $this->renderItems($item['items']);
                $menu .= Html::tag('ul', $subMenuItems, $subMenuOptions);

                if ($item['active']){
                    Html::addCssClass($options, 'menu-open');
                }
            }

            $lines[] = Html::tag($tag, $menu, $options);
        }

        return implode("\n", $lines);

    }

    /**
     * @param $item array
     * @return string
     * @throws \Exception
     */
    protected function renderBadge($item)
    {
        $badge = ArrayHelper::getValue($item, 'badge');
        if ($badge == null) {
            return '';
        } else {
            $badgeClass = ArrayHelper::getValue($item, 'badgeClass', $this->badgeClass);
            return Html::tag('span', $badge, ['class' => "right badge badge-{$badgeClass}", ]);
        }
    }

    /**
     * @param array $item
     * @return string
     * @throws \Exception
     */
    private function renderLabel($item)
    {

        $left = empty($item['items']) ? '' : ' <i class="right fas fa-angle-left"></i>';
        $label = $item['label'];
        $iconClass = 'circle,far';
        if (isset($item['icon'])){
            $iconClass = $item['icon'];
        }

        if (empty($iconClass)){
            if ($item['active']){
                $iconClass = 'circle';
            }
            else{
                $iconClass = 'circle,far';
            }
        }

        $icon = Html::icon($iconClass, ['class' => 'nav-icon']);

        $badge = $this->renderBadge($item);

        return $icon.Html::tag('p', $label.$badge.$left);

    }

}