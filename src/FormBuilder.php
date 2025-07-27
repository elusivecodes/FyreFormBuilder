<?php
declare(strict_types=1);

namespace Fyre\Form;

use BadMethodCallException;
use Fyre\Utility\HtmlHelper;
use Fyre\Utility\Traits\MacroTrait;

use function array_key_exists;
use function array_shift;
use function in_array;
use function is_array;

/**
 * FormBuilder
 */
class FormBuilder
{
    use MacroTrait;

    protected const INPUT_TYPES = [
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
        'week',
    ];

    /**
     * New FormBuilder constructor.
     *
     * @param HtmlHelper $html The HtmlHelper.
     */
    public function __construct(
        protected HtmlHelper $html
    ) {}

    /**
     * Render an input type element.
     *
     * @param string $type The input type.
     * @param array $arguments Arguments to pass to the input method.
     * @return string The input HTML.
     *
     * @throws BadMethodCallException if the input type is not valid.
     */
    public function __call(string $type, array $arguments): string
    {
        if ($type === 'datetime') {
            $type = 'datetime-local';
        }

        if (!in_array($type, static::INPUT_TYPES)) {
            throw new BadMethodCallException('Invalid input type');
        }

        $name = array_shift($arguments);
        $options = array_shift($arguments) ?? [];
        $options['type'] = $type;

        return $this->input($name, $options);
    }

    /**
     * Render a button element.
     *
     * @param string $content The button content.
     * @param array $options Options for rendering the button.
     * @return string The button HTML.
     */
    public function button(string $content = '', array $options = []): string
    {
        $escape = $options['escape'] ?? true;
        unset($options['escape']);

        $options['type'] ??= 'button';

        if ($escape) {
            $content = $this->html->escape($content);
        }

        return '<button'.$this->html->attributes($options).'>'.$content.'</button>';
    }

    /**
     * Render a form close tag.
     *
     * @return string The form close HTML.
     */
    public function close(): string
    {
        return '</form>';
    }

    /**
     * Render a fieldset close tag.
     *
     * @return string The fieldset close HTML.
     */
    public function fieldsetClose(): string
    {
        return '</fieldset>';
    }

    /**
     * Render a fieldset open tag.
     *
     * @param array $options Options for rendering the fieldset.
     * @return string The fieldset open HTML.
     */
    public function fieldsetOpen(array $options = []): string
    {
        return '<fieldset'.$this->html->attributes($options).'>';
    }

    /**
     * Render an input element.
     *
     * @param string|null $name The input name.
     * @param array $options Options for rendering the input.
     * @return string The input HTML.
     */
    public function input(string|null $name = null, array $options = []): string
    {
        if ($name !== null) {
            $options['name'] ??= $name;
        }

        $options['type'] ??= 'text';

        return '<input'.$this->html->attributes($options).' />';
    }

    /**
     * Render a label element.
     *
     * @param string $content The label content.
     * @param array $options Options for rendering the label.
     * @return string The label HTML.
     */
    public function label(string $content = '', array $options = []): string
    {
        $escape = $options['escape'] ?? true;
        unset($options['escape']);

        if ($escape) {
            $content = $this->html->escape($content);
        }

        return '<label'.$this->html->attributes($options).'>'.$content.'</label>';
    }

    /**
     * Render a legend element.
     *
     * @param string $content The legend content.
     * @param array $options Options for rendering the legend.
     * @return string The legend HTML.
     */
    public function legend(string $content = '', array $options = []): string
    {
        $escape = $options['escape'] ?? true;
        unset($options['escape']);

        if ($escape) {
            $content = $this->html->escape($content);
        }

        return '<legend'.$this->html->attributes($options).'>'.$content.'</legend>';
    }

    /**
     * Render a form open tag.
     *
     * @param string|null $action The form action.
     * @param array $options Options for rendering the form.
     * @return string The form open HTML.
     */
    public function open(string|null $action = null, array $options = []): string
    {
        if ($action !== null) {
            $options['action'] ??= $action;
        }

        $options['method'] ??= 'post';
        $options['charset'] ??= $this->html->getCharset();

        return '<form'.$this->html->attributes($options).'>';
    }

    /**
     * Render a multipart form open tag.
     *
     * @param string|null $action The form action.
     * @param array $options Options for rendering the form.
     * @return string The form open HTML.
     */
    public function openMultipart(string|null $action = null, array $options = []): string
    {
        $options['enctype'] = 'multipart/form-data';

        return $this->open($action, $options);
    }

    /**
     * Render a select element.
     *
     * @param string|null $name The select name.
     * @param array $options Options for rendering the select.
     * @return string The select HTML.
     */
    public function select(string|null $name = null, array $options = []): string
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

        $html = '<select'.$this->html->attributes($options).'>';
        $html .= $this->buildOptions($selectOptions, $selected);
        $html .= '</select>';

        return $html;
    }

    /**
     * Render a multiple select element.
     *
     * @param string|null $name The select name.
     * @param array $options Options for rendering the select.
     * @return string The select HTML.
     */
    public function selectMulti(string|null $name = null, array $options = []): string
    {
        $options[] = 'multiple';

        return $this->select($name, $options);
    }

    /**
     * Render a textarea element.
     *
     * @param string|null $name The textarea name.
     * @param array $options Options for rendering the textarea.
     * @return string The textarea HTML.
     */
    public function textarea(string|null $name = null, array $options = []): string
    {
        if ($name !== null) {
            $options['name'] ??= $name;
        }

        $value = $options['value'] ?? '';
        unset($options['value']);

        return '<textarea'.$this->html->attributes($options).'>'.$this->html->escape($value).'</textarea>';
    }

    /**
     * Render select options.
     *
     * @param array $options The select options.
     * @param array $selected The selected values.
     * @return string The options HTML.
     */
    protected function buildOptions(array $options, array $selected): string
    {
        $html = '';

        foreach ($options as $value => $option) {
            if (!is_array($option)) {
                $option = [
                    'label' => $option,
                ];
            }

            if (array_key_exists('children', $option)) {
                $children = $option['children'];
                unset($option['children']);

                $html .= '<optgroup'.$this->html->attributes($option).'>';
                $html .= $this->buildOptions($children, $selected);
                $html .= '</optgroup>';
            } else {
                $option['value'] ??= $value;
                $label = $option['label'] ?? $option['value'];
                unset($option['label']);

                if (in_array($option['value'], $selected)) {
                    $option[] = 'selected';
                }

                $html .= '<option'.$this->html->attributes($option).'>'.$this->html->escape($label).'</option>';
            }
        }

        return $html;
    }
}
