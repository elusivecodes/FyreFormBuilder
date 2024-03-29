# FyreFormBuilder

**FyreFormBuilder** is a free, open-source form builder library for *PHP*.


## Table Of Contents
- [Installation](#installation)
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


## Methods

**Button**

Render a button element.

- `$content` is a string representing the button content.
- `$options` is an array of options for rendering the button.

```php
$button = FormBuilder::button($content, $options);
```

By default, the button content will be HTML escaped. To disable this, set the `escape` value to *false* in the `options` array.

All other `options` will be created as attributes on the button element.

**Close**

Render a form close tag.

```php
$close = FormBuilder::close();
```

**Fieldset Close**

Render a fieldset close tag.

```php
$fieldsetClose = FormBuilder::fieldsetClose();
```

**Fieldset Open**

Render a fieldset open tag.

- `$options` is an array of options for rendering the fieldset.

```php
$fieldset = FormBuilder::fieldsetOpen($options);
```

All `options` will be created as attributes on the fieldset element.

**Input**

Render an input element.

- `$name` is a string representing the input name.
- `$options` is an array of options for rendering the input.

```php
$input = FormBuilder::input($name, $options);
```

All `options` will be created as attributes on the input element.

By default, the input will be created as a text type. You can use the following helper methods to generate other input type fields.

```php
$input = FormBuilder::checkbox($name, $options);
$input = FormBuilder::color($name, $options);
$input = FormBuilder::date($name, $options);
$input = FormBuilder::datetime($name, $options);
$input = FormBuilder::email($name, $options);
$input = FormBuilder::file($name, $options);
$input = FormBuilder::hidden($name, $options);
$input = FormBuilder::image($name, $options);
$input = FormBuilder::month($name, $options);
$input = FormBuilder::number($name, $options);
$input = FormBuilder::password($name, $options);
$input = FormBuilder::radio($name, $options);
$input = FormBuilder::range($name, $options);
$input = FormBuilder::reset($name, $options);
$input = FormBuilder::search($name, $options);
$input = FormBuilder::submit($name, $options);
$input = FormBuilder::tel($name, $options);
$input = FormBuilder::text($name, $options);
$input = FormBuilder::time($name, $options);
$input = FormBuilder::url($name, $options);
$input = FormBuilder::week($name, $options);
```

**Label**

Render a label element.

- `$content` is a string representing the label content.
- `$options` is an array of options for rendering the label.

```php
$label = FormBuilder::label($content, $options);
```

By default, the label content will be HTML escaped. To disable this, set the `escape` value to *false* in the `options` array.

All other `options` will be created as attributes on the label element.

**Legend**

Render a legend element.

- `$content` is a string representing the legend content.
- `$options` is an array of options for rendering the legend.

```php
$legend = FormBuilder::legend($content, $options);
```

By default, the legend content will be HTML escaped. To disable this, set the `escape` value to *false* in the `options` array.

All other `options` will be created as attributes on the legend element.

**Open**

Render a form open tag.

- `$action` is a string representing the form action.
- `$options` is an array of options for rendering the form.

```php
$open = FormBuilder::open($action, $options);
```

All `options` will be created as attributes on the form element.

**Open Multipart**

Render a multipart form open tag.

- `$action` is a string representing the form action.
- `$options` is an array of options for rendering the form.

```php
$open = FormBuilder::openMultipart($action, $options);
```

All `options` will be created as attributes on the form element.

**Select**

Render a select element.

- `$name` is a string representing the select name.
- `$options` is an array of options for rendering the select.

```php
$select = FormBuilder::select($name, $options);
```

Option elements can be created by specifying an `options` value in the `options` array. Selected options can be specified using the `selected` value in the `options` array.

All other `options` will be created as attributes on the select element.

**Select Multiple**

Render a multiple select element.

- `$name` is a string representing the select name.
- `$options` is an array of options for rendering the select.

```php
$select = FormBuilder::selectMulti($name, $options);
```

Option elements can be created by specifying an `options` value in the `options` array. Selected options can be specified using the `selected` value in the `options` array.

All other `options` will be created as attributes on the select element.

**Textarea**

Render a textarea element.

- `$name` is a string representing the textarea name.
- `$options` is an array of options for rendering the textarea.

```php
$textarea = FormBuilder::textarea($name, $options);
```

All `options` will be created as attributes on the textarea element.