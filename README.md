# Yii2 Bootstrap Markdown Editor

Yii2 Markdown Editor based on [Bootstrap Markdown](http://www.codingdrama.com/bootstrap-markdown/).

This component use folowing libraries:
* [Marked](https://github.com/chjj/marked) -- a full-featured markdown parser and compiler, written in JavaScript.
* [To markdown](https://github.com/domchristie/to-markdown) -- an HTML to Markdown converter written in javascript.
* [Codemirror](https://github.com/codemirror/codemirror) -- JavaScript component that provides a code editor in the browser.


## Installation

### Composer

The preferred way to install this extension is through [Composer](http://getcomposer.org/).

Either run

```
php composer.phar require uran1980/yii2-bootstrap-markdown-editor "dev-master"
```

or add

```
"uran1980/yii2-bootstrap-markdown-editor": "dev-master"
```

to the require section of your ```composer.json```


## Usage

### Active widget

In view in active form:

```php
<?php

use yii\widgets\ActiveForm;
use uran1980\yii\widgets\markdown\MarkdownEditor;
?>

<div class="active-form">
    <?php $form = ActiveForm::begin(); ?>
    <?php echo $form->field($model, 'content')->widget(MarkdownEditor::className(), [
        'clientOptions' => ['language' => Yii::$app->language],
        'options'       => ['data-provider' => 'markdown'],
    ]); ?>
    <?php ActiveForm::end(); ?>
</div>
```


### Simple widget

In view:

```php
<?php
use uran1980\yii\widgets\markdown\MarkdownEditor;

echo MarkdownEditor::widget([
    'name'          => 'md-editor',
    'value'         => '# test message',
    'clientOptions' => ['language' => Yii::$app->language],
    'options'       => ['data-provider' => 'markdown'],
]);
```


## See also

* [Markdown reminder](http://sites.ateliers-pierrot.fr/markdown-extended/markdown_reminders.html)
* [Markdown cheatsheet](https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet#wiki-hr)
* [GFM (Github Flawored Markdown)](http://github.github.com/github-flavored-markdown/)


## Author
[Ivan Yakovlev](https://github.com/uran1980/), e-mail: [uran1980@gmail.com](mailto:uran1980@gmail.com)
