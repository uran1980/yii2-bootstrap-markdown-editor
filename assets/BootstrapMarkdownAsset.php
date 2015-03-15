<?php

namespace uran1980\yii\widgets\markdown\assets;

use Yii;
use yii\web\AssetBundle;
use yii\helpers\ArrayHelper;

class BootstrapMarkdownAsset extends AssetBundle
{
    public $sourcePath = '@bower/bootstrap-markdown';
    public $js = [
        'js/bootstrap-markdown.js',
    ];
    public $css = [
        'css/bootstrap-markdown.min.css',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',

        'uran1980\yii\widgets\markdown\assets\MarkedAsset',
        'uran1980\yii\widgets\markdown\assets\ToMarkdownAsset',
    ];

    public function init()
    {
        $this->registerLocale();

        parent::init();
    }

    public function registerLocale()
    {
        $localeAsset = 'locale/bootstrap-markdown.' . Yii::$app->language . '.js';
        if ( file_exists(Yii::getAlias($this->sourcePath . '/' . $localeAsset)) ) {
            $this->js[] = $localeAsset;
        } else {
            ArrayHelper::remove($this->clientOptions, 'language');
        }
    }
}