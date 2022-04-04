<?php
declare(strict_types=1);

namespace Fyre\FormBuilder;

use
    Fyre\Error\Exceptions\Exception;

use const
    ENT_HTML5,
    ENT_QUOTES,
    ENT_SUBSTITUTE;

use function
    array_key_exists,
    array_search,
    array_shift,
    count,
    htmlspecialchars,
    in_array,
    is_array,
    is_bool,
    is_numeric,
    is_object,
    json_encode,
    preg_match,
    preg_replace,
    strtolower,
    uksort;

/**
 * FormBuilder
 */
class FormBuilder
{

    protected static array $inputTypes = [
        'checkbox',
        'color',
        'date',
        'datetime-local',
        'email',
        'file',
        'hidden',
        'image',
        'month',
        'number',
        'password',
        'radio',
        'range',
        'reset',
        'search',
        'submit',
        'tel',
        'text',
        'time',
        'url',
        'week'
    ];

    protected static array $attributesOrder = [
        'class',
        'id',
        'name',
        'data-',
        'src',
        'for',
        'type',
        'href',
        'action',
        'method',
        'value',
        'title',
        'alt',
        'role',
        'aria-'
    ];

    protected static string $charset = 'UTF-8';

    /**
     * Render an input type element.
     * @param string $type The input type.
     * @param array $arguments Arguments to pass to the input method.
     * @return string The input HTML.
     * @throws Exception if the input type is invalid.
     */
    public static function __callStatic(string $type, array $arguments): string
    {
        if ($type === 'datetime') {
            $type = 'datetime-local';
        }

        if (!in_array($type, static::$inputTypes)) {
            throw new Exception('Invalid input type');
        }

        $name = array_shift($arguments);
        $options = array_shift($arguments) ?? [];
        $options['type'] = $type;

        return static::input($name, $options);
    }

    /**
     * Render a button element.
     * @param string $content The button content.
     * @param array $options Options for rendering the button.
     * @return string The button HTML.
     */
    public static function button(string $content = '', array $options = []): string
    {
        $escape = $options['escape'] ?? true;
        unset($options['escape']);

        $options['type'] ??= 'button';

        if ($escape) {
            $content = static::escape($content);
        }

        return '<button'.static::attributes($options).'>'.$content.'</button>';
    }

    /**
     * Render a form close tag.
     * @return string The form close HTML.
     */
    public static function close(): string
    {
        return '</form>';
    }

    /**
     * Render a fieldset close tag.
     * @return string The fieldset close HTML.
     */
    public static function fieldsetClose(): string
    {
        return '</fieldset>';
    }

    /**
     * Render a fieldset open tag.
     * @param array $options Options for rendering the fieldset.
     * @return string The fieldset open HTML.
     */
    public static function fieldsetOpen(array $options = []): string
    {
        return '<fieldset'.static::attributes($options).'>';
    }

    /**
     * Get the charset.
     * @return string $charset The charset.
     */
    public static function getCharset(): string
    {
        return static::$charset;
    }

    /**
     * Render an input element.
     * @param string|null $name The input name.
     * @param array $options Options for rendering the input.
     * @return string The input HTML.
     */
    public static function input(string|null $name = null, array $options = []): string
    {
        if ($name !== null) {
            $options['name'] ??= $name;
        }

        $options['type'] ??= 'text';

        return '<input'.static::attributes($options).' />';
    }

    /**
     * Render a label element.
     * @param string $content The label content.
     * @param array $options Options for rendering the label.
     * @return string The label HTML.
     */
    public static function label(string $content = '', array $options = []): string
    {
        $escape = $options['escape'] ?? true;
        unset($options['escape']);

        if ($escape) {
            $content = static::escape($content);
        }

        return '<label'.static::attributes($options).'>'.$content.'</label>';
    }

    /**
     * Render a legend element.
     * @param string $content The legend content.
     * @param array $options Options for rendering the legend.
     * @return string The legend HTML.
     */
    public static function legend(string $content = '', array $options = []): string
    {
        $escape = $options['escape'] ?? true;
        unset($options['escape']);

        if ($escape) {
            $content = static::escape($content);
        }

        return '<legend'.static::attributes($options).'>'.$content.'</legend>';
    }

    /**
     * Render a form open tag.
     * @param string|null $action The form action.
     * @param array $options Options for rendering the form.
     * @return string The form open HTML.
     */
    public static function open(string|null $action = null, array $options = []): string
    {
        if ($action !== null) {
            $options['action'] ??= $action;
        }

        $options['method'] ??= 'post';
        $options['charset'] ??= static::$charset;

        return '<form'.static::attributes($options).'>';
    }

    /**
     * Render a multipart form open tag.
     * @param string|null $action The form action.
     * @param array $options Options for rendering the form.
     * @return string The form open HTML.
     */
    public static function openMultipart(string|null $action = null, array $options = []): string
    {
        $options['enctype'] = 'multipart/form-data';

        return static::open($action, $options);
    }

    /**
     * Render a select element.
     * @param string|null $name The select name.
     * @param array $options Options for rendering the select.
     * @return string The select HTML.
     */
    public static function select(string|null $name = null, array $options = []): string
    {
        if ($name !== null) {
            $options['name'] ??= $name;
        }

        $selectOptions = $options['options'] ?? [];
        unset($options['options']);

        $selected = $options['value'] ?? [];
        unset($options['value']);

        if (!is_array($selected)) {
            $selected = [$selected];
        }

        $html = '<select'.static::attributes($options).'>';
        $html .= static::buildOptions($selectOptions, $selected);
        $html .= '</select>';

        return $html;
    }

    /**
     * Render a multiple select element.
     * @param string|null $name The select name.
     * @param array $options Options for rendering the select.
     * @return string The select HTML.
     */
    public static function selectMulti(string|null $name = null, array $options = []): string
    {
        $options[] = 'multiple';

        return static::select($name, $options);
    }

    /**
     * Set the charset.
     * @param string $charset The charset.
     */
    public static function setCharset(string $charset): void
    {
        static::$charset = $charset;
    }

    /**
     * Render a textarea element.
     * @param string|null $name The textarea name.
     * @param array $options Options for rendering the textarea.
     * @return string The textarea HTML.
     */
    public static function textarea(string|null $name = null, array $options = []): string
    {
        if ($name !== null) {
            $options['name'] ??= $name;
        }

        $value = $options['value'] ?? '';
        unset($options['value']);

        return '<textarea'.static::attributes($options).'>'.static::escape($value).'</textarea>';
    }

    /**
     * Get the index for an attribute.
     * @param string $attribute The attribute name.
     * @return int The attribute index.
     */
    protected static function attributeIndex(string $attribute): int
    {
        if (preg_match('/^(data|aria)-/', $attribute)) {
            $attribute = substr($attribute, 0, 5);
        }

        $index = array_search($attribute, static::$attributesOrder);

        if ($index === false) {
            return count(static::$attributesOrder);
        }

        return $index;
    }

    /**
     * Generate an attribute string.
     * @param array $options The attributes.
     * @return string The attribute string.
     */
    protected static function attributes(array $options = []): string
    {
        $attributes = [];

        foreach ($options AS $key => $value) {
            if ($value === null) {
                continue;
            }

            if (is_numeric($key)) {
                $key = $value;
                $value = null;
            }

            $key = preg_replace('/[^\w-]/', '', $key);
            $key = strtolower($key);

            if (!$key) {
                continue;
            }

            if (is_bool($value)) {
                $value = $value ? null : 'false';
            } else if (is_array($value) || is_object($value)) {
                $value = json_encode($value);
                $value = static::escape($value);
            } else if ($value !== null) {
                $value = static::escape((string) $value);
            }

            $attributes[$key] = $value;
        }

        if ($attributes === []) {
            return '';
        }

        uksort($attributes, fn(string $a, string $b): int => static::attributeIndex($a) - static::attributeIndex($b));

        $html = '';

        foreach ($attributes AS $key => $value) {
            if ($value !== null) {
                $html .= ' '.$key.'="'.$value.'"';
            } else {
                $html .= ' '.$key;
            }
        }

        return $html;
    }

    /**
     * Render select options.
     * @param array $options The select options.
     * @param array $selected The selected values.
     * @return string The options HTML.
     */
    protected static function buildOptions(array $options, array $selected): string
    {
        $html = '';

        foreach ($options AS $value => $option) {
            if (!is_array($option)) {
                $option = [
                    'label' => $option
                ];
            }

            if (array_key_exists('children', $option)) {
                $children = $option['children'];
                unset($option['children']);

                $html .= '<optgroup'.static::attributes($option).'>';
                $html .= static::buildOptions($children, $selected);
                $html .= '</optgroup>';
            } else {
                $option['value'] ??= $value;
                $label = $option['label'] ?? $option['value'];
                unset($option['label']);

                if (in_array($option['value'], $selected)) {
                    $option[] = 'selected';
                }

                $html .= '<option'.static::attributes($option).'>'.static::escape($label).'</option>';
            }
        }

        return $html;
    }

    /**
     * Escape characters in a string for use in HTML.
     * @param string $string The input string.
     * @return string The escaped string.
     */
    protected static function escape(string $string): string
    {
        return htmlspecialchars($string, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, static::$charset);
    }

}
