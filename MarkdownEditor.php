<?php

namespace uran1980\yii\widgets\markdown;

use Yii;
use yii\helpers\Json;
use yii\web\AssetBundle;
use yii\widgets\InputWidget;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use uran1980\yii\widgets\markdown\assets\MarkdownEditorAsset;

class MarkdownEditor extends InputWidget
{
    /**
     * @var array
     */
    public $clientOptions = [];

    /**
     * @var \uran1980\yii\widgets\markdown\assets\MarkdownEditorAsset
     */
    private $_assetBundle;

    public function init()
    {
        if ($this->hasModel()) {
            $this->options['id'] = Html::getInputId($this->model, $this->attribute);
        } else {
            $this->options['id'] = $this->getId();
        }
        $this->registerAssetBundle();
        $this->registerScript();
        $this->registerEvent();
    }

    /**
     * @return array
     */
    public function getClientOptionsDefaults()
    {
        return [
            'language'  => Yii::$app->language,
            'autofocus' => true,
        ];
    }

    public function run()
    {
        if ($this->hasModel()) {
            echo Html::activeTextarea($this->model, $this->attribute, $this->options);
        } else {
            echo Html::textarea($this->name, $this->value, $this->options);
        }
    }

    public function registerAssetBundle()
    {
        $this->_assetBundle = MarkdownEditorAsset::register($this->getView());
    }

    public function registerScript()
    {
        $config = Json::encode(ArrayHelper::merge(
            $this->getClientOptionsDefaults(),
            $this->clientOptions
        ));

        $js = <<<SCRIPT
!(function ($) {
    $('#{$this->options['id']}').markdown({$config});
})(window.jQuery);
SCRIPT;
        $this->getView()->registerJs($js, \yii\web\View::POS_READY);
    }

    public function registerEvent()
    {
        if (!empty($this->clientEvents)) {
            $js = [];
            foreach ($this->clientEvents as $event => $handle) {
                $js[] = "jQuery('#{$this->options['id']}').on('{$event}',{$handle});";
            }
            $this->getView()->registerJs(implode(PHP_EOL, $js));
        }
    }

    /**
     * @return \uran1980\yii\widgets\markdown\assets\MarkdownEditorAsset
     */
    public function getAssetBundle()
    {
        if (!($this->_assetBundle instanceof AssetBundle)) {
            $this->registerAssetBundle();
        }

        return $this->_assetBundle;
    }
}

