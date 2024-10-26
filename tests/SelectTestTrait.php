<?php
declare(strict_types=1);

namespace Tests;

trait SelectTestTrait
{
    public function testSelect(): void
    {
        $this->assertSame(
            '<select></select>',
            $this->form->select()
        );
    }

    public function testSelectAttributeArray(): void
    {
        $this->assertSame(
            '<select data-test="[1,2]"></select>',
            $this->form->select(null, [
                'data-test' => [1, 2],
            ])
        );
    }

    public function testSelectAttributeEscape(): void
    {
        $this->assertSame(
            '<select data-test="&lt;test&gt;"></select>',
            $this->form->select(null, [
                'data-test' => '<test>',
            ])
        );
    }

    public function testSelectAttributeInvalid(): void
    {
        $this->assertSame(
            '<select class="test"></select>',
            $this->form->select(null, [
                '*class*' => 'test',
            ])
        );
    }

    public function testSelectAttributes(): void
    {
        $this->assertSame(
            '<select class="test" id="select"></select>',
            $this->form->select(null, [
                'class' => 'test',
                'id' => 'select',
            ])
        );
    }

    public function testSelectAttributesOrder(): void
    {
        $this->assertSame(
            '<select class="test" id="select"></select>',
            $this->form->select(null, [
                'id' => 'select',
                'class' => 'test',
            ])
        );
    }

    public function testSelectName(): void
    {
        $this->assertSame(
            '<select name="select"></select>',
            $this->form->select('select')
        );
    }

    public function testSelectOptionGroup(): void
    {
        $this->assertSame(
            '<select><optgroup label="test"><option value="0">A</option><option value="1">B</option></optgroup></select>',
            $this->form->select(null, [
                'options' => [
                    [
                        'label' => 'test',
                        'children' => [
                            'A',
                            'B',
                        ],
                    ],
                ],
            ])
        );
    }

    public function testSelectOptions(): void
    {
        $this->assertSame(
            '<select><option value="0">A</option><option value="1">B</option></select>',
            $this->form->select(null, [
                'options' => [
                    'A',
                    'B',
                ],
            ])
        );
    }

    public function testSelectOptionsAssoc(): void
    {
        $this->assertSame(
            '<select><option value="a">A</option></select>',
            $this->form->select(null, [
                'options' => [
                    'a' => 'A',
                ],
            ])
        );
    }

    public function testSelectOptionsAttributes(): void
    {
        $this->assertSame(
            '<select><option value="a">A</option></select>',
            $this->form->select(null, [
                'options' => [
                    [
                        'value' => 'a',
                        'label' => 'A',
                    ],
                ],
            ])
        );
    }

    public function testSelectOptionsAttributesEscape(): void
    {
        $this->assertSame(
            '<select><option data-test="&lt;test&gt;" value="a">A</option></select>',
            $this->form->select(null, [
                'options' => [
                    [
                        'value' => 'a',
                        'label' => 'A',
                        'data-test' => '<test>',
                    ],
                ],
            ])
        );
    }

    public function testSelectOptionsAttributesInvalid(): void
    {
        $this->assertSame(
            '<select><option class="test" value="a">A</option></select>',
            $this->form->select(null, [
                'options' => [
                    [
                        'value' => 'a',
                        'label' => 'A',
                        '*class*' => 'test',
                    ],
                ],
            ])
        );
    }

    public function testSelectOptionsEscape(): void
    {
        $this->assertSame(
            '<select><option value="0">&lt;test&gt;</option></select>',
            $this->form->select(null, [
                'options' => [
                    '<test>',
                ],
            ])
        );
    }

    public function testSelectSelected(): void
    {
        $this->assertSame(
            '<select><option value="0">A</option><option value="1" selected>B</option></select>',
            $this->form->select(null, [
                'options' => [
                    'A',
                    'B',
                ],
                'value' => 1,
            ])
        );
    }
}
