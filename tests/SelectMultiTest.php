<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\FormBuilder\FormBuilder;

trait SelectMultiTest
{

    public function testSelectMulti(): void
    {
        $this->assertSame(
            '<select multiple></select>',
            FormBuilder::selectMulti()
        );
    }

    public function testSelectMultiName(): void
    {
        $this->assertSame(
            '<select name="select" multiple></select>',
            FormBuilder::selectMulti('select')
        );
    }

    public function testSelectMultiOptions(): void
    {
        $this->assertSame(
            '<select multiple><option value="0">A</option><option value="1">B</option></select>',
            FormBuilder::selectMulti(null, [
                'options' => [
                    'A',
                    'B'
                ]
            ])
        );
    }

    public function testSelectMultiOptionsEscape(): void
    {
        $this->assertSame(
            '<select multiple><option value="0">&lt;test&gt;</option></select>',
            FormBuilder::selectMulti(null, [
                'options' => [
                    '<test>'
                ]
            ])
        );
    }

    public function testSelectMultiOptionsAssoc(): void
    {
        $this->assertSame(
            '<select multiple><option value="a">A</option></select>',
            FormBuilder::selectMulti(null, [
                'options' => [
                    'a' => 'A'
                ]
            ])
        );
    }

    public function testSelectMultiOptionsAttributes(): void
    {
        $this->assertSame(
            '<select multiple><option value="a">A</option></select>',
            FormBuilder::selectMulti(null, [
                'options' => [
                    [
                        'value' => 'a',
                        'label' => 'A'
                    ]
                ]
            ])
        );
    }

    public function testSelectMultiOptionsAttributesInvalid(): void
    {
        $this->assertSame(
            '<select multiple><option class="test" value="a">A</option></select>',
            FormBuilder::selectMulti(null, [
                'options' => [
                    [
                        'value' => 'a',
                        'label' => 'A',
                        '*class*' => 'test'
                    ]
                ]
            ])
        );
    }

    public function testSelectMultiOptionsAttributesEscape(): void
    {
        $this->assertSame(
            '<select multiple><option data-test="&lt;test&gt;" value="a">A</option></select>',
            FormBuilder::selectMulti(null, [
                'options' => [
                    [
                        'value' => 'a',
                        'label' => 'A',
                        'data-test' => '<test>'
                    ]
                ]
            ])
        );
    }

    public function testSelectMultiOptionGroup(): void
    {
        $this->assertSame(
            '<select multiple><optgroup label="test"><option value="0">A</option><option value="1">B</option></optgroup></select>',
            FormBuilder::selectMulti(null, [
                'options' => [
                    [
                        'label' => 'test',
                        'children' => [
                            'A',
                            'B'
                        ]
                    ]
                ]
            ])
        );
    }

    public function testSelectMultiSelected(): void
    {
        $this->assertSame(
            '<select multiple><option value="0">A</option><option value="1" selected>B</option></select>',
            FormBuilder::selectMulti(null, [
                'options' => [
                    'A',
                    'B'
                ],
                'value' => 1
            ])
        );
    }

    public function testSelectMultiSelectedArray(): void
    {
        $this->assertSame(
            '<select multiple><option value="0">A</option><option value="1" selected>B</option><option value="2" selected>C</option></select>',
            FormBuilder::selectMulti(null, [
                'options' => [
                    'A',
                    'B',
                    'C'
                ],
                'value' => [1, 2]
            ])
        );
    }

    public function testSelectMultiAttributes(): void
    {
        $this->assertSame(
            '<select class="test" id="select" multiple></select>',
            FormBuilder::selectMulti(null, [
                'class' => 'test',
                'id' => 'select'
            ])
        );
    }

    public function testSelectMultiAttributesOrder(): void
    {
        $this->assertSame(
            '<select class="test" id="select" multiple></select>',
            FormBuilder::selectMulti(null, [
                'id' => 'select',
                'class' => 'test'
            ])
        );
    }

    public function testSelectMultiAttributeInvalid(): void
    {
        $this->assertSame(
            '<select class="test" multiple></select>',
            FormBuilder::selectMulti(null, [
                '*class*' => 'test'
            ])
        );
    }

    public function testSelectMultiAttributeEscape(): void
    {
        $this->assertSame(
            '<select data-test="&lt;test&gt;" multiple></select>',
            FormBuilder::selectMulti(null, [
                'data-test' => '<test>'
            ])
        );
    }

    public function testSelectMultiAttributeArray(): void
    {
        $this->assertSame(
            '<select data-test="[1,2]" multiple></select>',
            FormBuilder::selectMulti(null, [
                'data-test' => [1, 2]
            ])
        );
    }

}
