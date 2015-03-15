<?php

namespace uran1980\yii\widgets\markdown\assets;

use yii\web\AssetBundle;

class MarkdownEditorAsset extends AssetBundle
{
    public $sourcePath = '@uran1980/yii/widgets/markdown/assets';
    public $js = [
        'js/app-markdown-editor.js',
    ];
    public $css = [
        'css/app-markdown-editor.css',
    ];
    public $depends = [
        'uran1980\yii\widgets\markdown\assets\BootstrapMarkdownAsset',
        'uran1980\yii\assets\TextareaAutosizeAsset',
        'uran1980\yii\assets\jQueryEssential\JqueryEssentialAsset',
    ];
}