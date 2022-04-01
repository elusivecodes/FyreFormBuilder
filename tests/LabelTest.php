<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\FormBuilder\FormBuilder;

trait LabelTest
{

    public function testLabel(): void
    {
        $this->assertSame(
            '<label></label>',
            FormBuilder::label()
        );
    }

    public function testLabelContent(): void
    {
        $this->assertSame(
            '<label>Test</label>',
            FormBuilder::label('Test')
        );
    }

    public function testLabelContentEscape(): void
    {
        $this->assertSame(
            '<label>&lt;i&gt;Test&lt;/i&gt;</label>',
            FormBuilder::label('<i>Test</i>')
        );
    }

    public function testLabelContentNoEscape(): void
    {
        $this->assertSame(
            '<label><i>Test</i></label>',
            FormBuilder::label('<i>Test</i>', [
                'escape' => false
            ])
        );
    }

    public function testLabelAttributes(): void
    {
        $this->assertSame(
            '<label class="test" id="label"></label>',
            FormBuilder::label('', [
                'class' => 'test',
                'id' => 'label'
            ])
        );
    }

    public function testLabelAttributesOrder(): void
    {
        $this->assertSame(
            '<label class="test" id="label"></label>',
            FormBuilder::label('', [
                'id' => 'label',
                'class' => 'test'
            ])
        );
    }

    public function testLabelAttributeInvalid(): void
    {
        $this->assertSame(
            '<label class="test"></label>',
            FormBuilder::label('', [
                '*class*' => 'test'
            ])
        );
    }

    public function testLabelAttributeEscape(): void
    {
        $this->assertSame(
            '<label data-test="&lt;test&gt;"></label>',
            FormBuilder::label('', [
                'data-test' => '<test>'
            ])
        );
    }

    public function testLabelAttributeArray(): void
    {
        $this->assertSame(
            '<label data-test="[1,2]"></label>',
            FormBuilder::label('', [
                'data-test' => [1, 2]
            ])
        );
    }

}
