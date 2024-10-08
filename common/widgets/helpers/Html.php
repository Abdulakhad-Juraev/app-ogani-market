<?php

namespace common\widgets\helpers;

use Yii;
use yii\helpers\ArrayHelper;

class Html extends \yii\helpers\Html

{

    /**
     * Generates a tag with icon
     * if $options[visible] == false return ""
     * @param string $text
     * @param string|array $url
     * @param array $options
     * @param null|string $icon
     * @return string
     */
    public static function a($text, $url = null, $options = [], $icon = null)
    {

        if (isset($options['visible'])) {
            if (!$options['visible']) {
                return "";
            }
            unset($options['visible']);
        }

        $text = static::withIcon($text, $icon);
        return parent::a($text, $url, $options);
    }

    /**
     * Generates icon
     * @param null|string|array $icon - Ikonka nomi,
     *  agar array shaklida berilsa, Html::tag() methodi orqali generatsiya qilinadi
     *  agar ikonkaning nomi o'zi berilsa, fa fa-icon generatsiya qilinadi,
     *  yoki `user,fas` , `user,gly` (bs3 glyphicon) ko'rinishda berilsa, mos ravishda verguldan keyingi ikonka classiga qarab generatsiya qiladi
     * @param array $options
     * @return string
     */
    public static function icon($icon = null, $options = [])
    {
        if (empty($icon)) {
            return "";
        }

        if (is_array($icon)) {
            $tag = ArrayHelper::remove($icon, 'tag', 'i');
            return \soft\helpers\Html::tag($tag, '', $icon);
        }

        $icon = explode(",", $icon);

        if (count($icon) > 1) {
            $iconClass = $icon[1];
            switch ($iconClass) {

                case "gly" :
                    $class = 'glyphicon glyphicon-' . $icon[0];
                    break;
                case "fas" :
                    $class = 'fas fa-' . $icon[0];
                    break;
                case "far" :
                    $class = 'far fa-' . $icon[0];
                    break;
                case "fab" :
                    $class = 'fab fa-' . $icon[0];
                    break;
                case "feather" :
                    $class = 'feather icon-' . $icon[0];
                    break;

                default:
                    $class = "{$iconClass} {$iconClass}-{$icon[0]}";
                    break;

            }
        } else {
            $class = 'fa fa-' . $icon[0];
        }
        Html::addCssClass($options, $class);
        return Html::tag('i', '', $options);
    }

    /**
     * Generates text with icon
     * @param null|string $text
     * @param null|string|array $icon
     * @param array $options
     * @return string|null
     */
    public static function withIcon($text = null, $icon = null, $options = [])
    {
        if ($icon == null) {
            return $text;
        }
        return static::icon($icon, $options) . " " . $text;
    }

    /**
     * Generates badge
     * @param string|null $text
     * @return string
     * @throws \Exception
     */
    public static function badge($text, $class = 'primary', $options = [])
    {
        $classPrefix = isBs('3') ? 'label' : 'badge';
        Html::addCssClass($options, "$classPrefix $classPrefix-$class");
        return parent::tag('span', $text, $options);
    }

    /**
     * @param null $content
     * @param array $options
     * @return string
     * @throws \Exception
     */
    public static function submitButton($content = null, $options = [])
    {
        if (isset($options['visible'])) {
            if (!$options['visible']) {
                return "";
            }
            unset($options['visible']);
        }

        $content = $content == null ? Yii::t('site', 'Save') : $content;
        if (!isset($options['class'])) {
            $options['class'] = 'btn btn-success';
        }

        return parent::submitButton($content, $options);

    }

    /**
     *
     * @param $content string
     * @param $options array
     * @return string
     * @throws \Exception
     */
    public static function nonAjaxSubmitButton($content = null, $options = [])
    {
        if (Yii::$app->request->isAjax) {
            return '';
        }
        return self::submitButton($content, $options);
    }

    /**
     * @param $url mixed
     * @param $options array
     *  - 'visible' - bool, defaults to true
     *  - 'text' - string, button text, defauls to 'Update'
     *  - 'icon' - string, button icon, defaults to 'edit'
     * @return string
     */
    public static function updateButton($url, $options = [])
    {

        $text = ArrayHelper::remove($options, 'text', Yii::t('site', 'Update'));
        $icon = ArrayHelper::remove($options, 'text', 'edit');

        $options = ArrayHelper::merge([
            'class' => 'btn btn-primary',
        ], $options);

        return self::a($text, $url, $options, $icon);
    }

    /**
     * @param $url mixed
     * @param $options array
     *  - 'visible' - bool, defaults to true
     *  - 'text' - string, button text, defauls to 'Delete'
     *  - 'icon' - string, button icon, defaults to 'trash'
     * @return string
     */
    public static function deleteButton($url, $options = [])
    {

        $text = ArrayHelper::remove($options, 'text', Yii::t('site', 'Delete'));
        $icon = ArrayHelper::remove($options, 'text', 'trash');

        $options = ArrayHelper::merge([
            'data-method' => 'post',
            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
            'data-pjax' => '0',
            'class' => 'btn btn-danger',
        ], $options);

        return self::a($text, $url, $options, $icon);
    }

    /**
     * @param $url mixed
     * @param $label string
     * @param $options array
     * @return string
     */
    public static function cancelButton($url, $label = null, $options = [], $icon = null)
    {
        $label = $label == null ? Yii::t('site', 'Cancel') : $label;
        $options = ArrayHelper::merge([
            'class' => 'btn btn-warning',
        ], $options);
        return self::a($label, $url, $options, $icon);
    }

    public static function registerCkeditorPlugin($pluginName, $pluginPath = null)
    {
        if ($pluginPath == null) {
            $pluginPath = "/packages/ckeditor/plugins/$pluginName/plugin.js";
        }
        Yii::$app->view->registerJs("CKEDITOR.plugins.addExternal('$pluginName', '$pluginPath', '');");
    }
}