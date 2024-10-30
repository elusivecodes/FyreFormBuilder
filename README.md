# FyreFormBuilder

**FyreFormBuilder** is a free, open-source form builder library for *PHP*.


## Table Of Contents
- [Installation](#installation)
- [Basic Usage](#basic-usage)
- [Methods](#methods)



## Installation

**Using Composer**

```
composer require fyre/formbuilder
```

In PHP:

```php
use Fyre\Form\FormBuilder;
```


## Basic Usage

- `$html` is a [*HtmlHelper*](https://github.com/elusivecodes/FyreHTMLHelper).

```php
$form = new FormBuilder($html);
```


## Methods

**Button**

Render a button element.

- `$content` is a string representing the button content.
- `$options` is an array of options for rendering the button.

```php
$button = $form->button($content, $options);
```

By default, the button content will be HTML escaped. To disable this, set the `escape` value to *false* in the `options` array.

All other `options` will be created as attributes on the button element.

**Close**

Render a form close tag.

```php
$close = $form->close();
```

**Fieldset Close**

Render a fieldset close tag.

```php
$fieldsetClose = $form->fieldsetClose();
```

**Fieldset Open**

Render a fieldset open tag.

- `$options` is an array of options for rendering the fieldset.

```php
$fieldset = $form->fieldsetOpen($options);
```

All `options` will be created as attributes on the fieldset element.

**Input**

Render an input element.

- `$name` is a string representing the input name.
- `$options` is an array of options for rendering the input.

```php
$input = $form->input($name, $options);
```

All `options` will be created as attributes on the input element.

By default, the input will be created as a text type. You can use the following helper methods to generate other input type fields.

```php
$input = $form->checkbox($name, $options);
$input = $form->color($name, $options);
$input = $form->date($name, $options);
$input = $form->datetime($name, $options);
$input = $form->email($name, $options);
$input = $form->file($name, $options);
$input = $form->hidden($name, $options);
$input = $form->image($name, $options);
$input = $form->month($name, $options);
$input = $form->number($name, $options);
$input = $form->password($name, $options);
$input = $form->radio($name, $options);
$input = $form->range($name, $options);
$input = $form->reset($name, $options);
$input = $form->search($name, $options);
$input = $form->submit($name, $options);
$input = $form->tel($name, $options);
$input = $form->text($name, $options);
$input = $form->time($name, $options);
$input = $form->url($name, $options);
$input = $form->week($name, $options);
```

**Label**

Render a label element.

- `$content` is a string representing the label content.
- `$options` is an array of options for rendering the label.

```php
$label = $form->label($content, $options);
```

By default, the label content will be HTML escaped. To disable this, set the `escape` value to *false* in the `options` array.

All other `options` will be created as attributes on the label element.

**Legend**

Render a legend element.

- `$content` is a string representing the legend content.
- `$options` is an array of options for rendering the legend.

```php
$legend = $form->legend($content, $options);
```

By default, the legend content will be HTML escaped. To disable this, set the `escape` value to *false* in the `options` array.

All other `options` will be created as attributes on the legend element.

**Open**

Render a form open tag.

- `$action` is a string representing the form action.
- `$options` is an array of options for rendering the form.

```php
$open = $form->open($action, $options);
```

All `options` will be created as attributes on the form element.

**Open Multipart**

Render a multipart form open tag.

- `$action` is a string representing the form action.
- `$options` is an array of options for rendering the form.

```php
$open = $form->openMultipart($action, $options);
```

All `options` will be created as attributes on the form element.

**Select**

Render a select element.

- `$name` is a string representing the select name.
- `$options` is an array of options for rendering the select.

```php
$select = $form->select($name, $options);
```

Option elements can be created by specifying an `options` value in the `options` array. Selected options can be specified using the `selected` value in the `options` array.

All other `options` will be created as attributes on the select element.

**Select Multiple**

Render a multiple select element.

- `$name` is a string representing the select name.
- `$options` is an array of options for rendering the select.

```php
$select = $form->selectMulti($name, $options);
```

Option elements can be created by specifying an `options` value in the `options` array. Selected options can be specified using the `selected` value in the `options` array.

All other `options` will be created as attributes on the select element.

**Textarea**

Render a textarea element.

- `$name` is a string representing the textarea name.
- `$options` is an array of options for rendering the textarea.

```php
$textarea = $form->textarea($name, $options);
```

All `options` will be created as attributes on the textarea element.