<?php
declare(strict_types=1);

namespace Tests;

trait LabelTestTrait
{
    public function testLabel(): void
    {
        $this->assertSame(
            '<label></label>',
            $this->form->label()
        );
    }

    public function testLabelAttributeArray(): void
    {
        $this->assertSame(
            '<label data-test="[1,2]"></label>',
            $this->form->label('', [
                'data-test' => [1, 2],
            ])
        );
    }

    public function testLabelAttributeEscape(): void
    {
        $this->assertSame(
            '<label data-test="&lt;test&gt;"></label>',
            $this->form->label('', [
                'data-test' => '<test>',
            ])
        );
    }

    public function testLabelAttributeInvalid(): void
    {
        $this->assertSame(
            '<label class="test"></label>',
            $this->form->label('', [
                '*class*' => 'test',
            ])
        );
    }

    public function testLabelAttributes(): void
    {
        $this->assertSame(
            '<label class="test" id="label"></label>',
            $this->form->label('', [
                'class' => 'test',
                'id' => 'label',
            ])
        );
    }

    public function testLabelAttributesOrder(): void
    {
        $this->assertSame(
            '<label class="test" id="label"></label>',
            $this->form->label('', [
                'id' => 'label',
                'class' => 'test',
            ])
        );
    }

    public function testLabelContent(): void
    {
        $this->assertSame(
            '<label>Test</label>',
            $this->form->label('Test')
        );
    }

    public function testLabelContentEscape(): void
    {
        $this->assertSame(
            '<label>&lt;i&gt;Test&lt;/i&gt;</label>',
            $this->form->label('<i>Test</i>')
        );
    }

    public function testLabelContentNoEscape(): void
    {
        $this->assertSame(
            '<label><i>Test</i></label>',
            $this->form->label('<i>Test</i>', [
                'escape' => false,
            ])
        );
    }
}
