<?php
declare(strict_types=1);

namespace Tests;

use Fyre\Form\FormBuilder;

trait SelectTestTrait
{

    public function testSelect(): void
    {
        $this->assertSame(
            '<select></select>',
            FormBuilder::select()
        );
    }

    public function testSelectName(): void
    {
        $this->assertSame(
            '<select name="select"></select>',
            FormBuilder::select('select')
        );
    }

    public function testSelectOptions(): void
    {
        $this->assertSame(
            '<select><option value="0">A</option><option value="1">B</option></select>',
            FormBuilder::select(null, [
                'options' => [
                    'A',
                    'B'
                ]
            ])
        );
    }

    public function testSelectOptionsEscape(): void
    {
        $this->assertSame(
            '<select><option value="0">&lt;test&gt;</option></select>',
            FormBuilder::select(null, [
                'options' => [
                    '<test>'
                ]
            ])
        );
    }

    public function testSelectOptionsAssoc(): void
    {
        $this->assertSame(
            '<select><option value="a">A</option></select>',
            FormBuilder::select(null, [
                'options' => [
                    'a' => 'A'
                ]
            ])
        );
    }

    public function testSelectOptionsAttributes(): void
    {
        $this->assertSame(
            '<select><option value="a">A</option></select>',
            FormBuilder::select(null, [
                'options' => [
                    [
                        'value' => 'a',
                        'label' => 'A'
                    ]
                ]
            ])
        );
    }

    public function testSelectOptionsAttributesInvalid(): void
    {
        $this->assertSame(
            '<select><option class="test" value="a">A</option></select>',
            FormBuilder::select(null, [
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

    public function testSelectOptionsAttributesEscape(): void
    {
        $this->assertSame(
            '<select><option data-test="&lt;test&gt;" value="a">A</option></select>',
            FormBuilder::select(null, [
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

    public function testSelectOptionGroup(): void
    {
        $this->assertSame(
            '<select><optgroup label="test"><option value="0">A</option><option value="1">B</option></optgroup></select>',
            FormBuilder::select(null, [
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

    public function testSelectSelected(): void
    {
        $this->assertSame(
            '<select><option value="0">A</option><option value="1" selected>B</option></select>',
            FormBuilder::select(null, [
                'options' => [
                    'A',
                    'B'
                ],
                'value' => 1
            ])
        );
    }

    public function testSelectAttributes(): void
    {
        $this->assertSame(
            '<select class="test" id="select"></select>',
            FormBuilder::select(null, [
                'class' => 'test',
                'id' => 'select'
            ])
        );
    }

    public function testSelectAttributesOrder(): void
    {
        $this->assertSame(
            '<select class="test" id="select"></select>',
            FormBuilder::select(null, [
                'id' => 'select',
                'class' => 'test'
            ])
        );
    }

    public function testSelectAttributeInvalid(): void
    {
        $this->assertSame(
            '<select class="test"></select>',
            FormBuilder::select(null, [
                '*class*' => 'test'
            ])
        );
    }

    public function testSelectAttributeEscape(): void
    {
        $this->assertSame(
            '<select data-test="&lt;test&gt;"></select>',
            FormBuilder::select(null, [
                'data-test' => '<test>'
            ])
        );
    }

    public function testSelectAttributeArray(): void
    {
        $this->assertSame(
            '<select data-test="[1,2]"></select>',
            FormBuilder::select(null, [
                'data-test' => [1, 2]
            ])
        );
    }

}
