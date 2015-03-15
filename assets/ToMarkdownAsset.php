<?php

namespace uran1980\yii\widgets\markdown\assets;

use yii\web\AssetBundle;

class ToMarkdownAsset extends AssetBundle
{
    public $sourcePath = '@bower/to-markdown/src';
    public $js = [
        'to-markdown.js',
    ];
    public $depends = [
        'uran1980\yii\widgets\markdown\assets\HeAsset',
    ];
}