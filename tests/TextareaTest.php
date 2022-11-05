<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\FormBuilder\FormBuilder;

trait TextareaTest
{

    public function testTextarea(): void
    {
        $this->assertSame(
            '<textarea></textarea>',
            FormBuilder::textarea()
        );
    }

    public function testTextareaName(): void
    {
        $this->assertSame(
            '<textarea name="textarea"></textarea>',
            FormBuilder::textarea('textarea')
        );
    }

    public function testTextareaValue(): void
    {
        $this->assertSame(
            '<textarea>Test</textarea>',
            FormBuilder::textarea(null, [
                'value' => 'Test'
            ])
        );
    }

    public function testTextareaValueEscape(): void
    {
        $this->assertSame(
            '<textarea>&lt;test&gt;</textarea>',
            FormBuilder::textarea(null, [
                'value' => '<test>'
            ])
        );
    }

    public function testTextareaAttributes(): void
    {
        $this->assertSame(
            '<textarea class="test" id="textarea"></textarea>',
            FormBuilder::textarea(null, [
                'class' => 'test',
                'id' => 'textarea'
            ])
        );
    }

    public function testTextareaAttributesOrder(): void
    {
        $this->assertSame(
            '<textarea class="test" id="textarea"></textarea>',
            FormBuilder::textarea(null, [
                'id' => 'textarea',
                'class' => 'test'
            ])
        );
    }

    public function testTextareaAttributeInvalid(): void
    {
        $this->assertSame(
            '<textarea class="test"></textarea>',
            FormBuilder::textarea(null, [
                '*class*' => 'test'
            ])
        );
    }

    public function testTextareaAttributeEscape(): void
    {
        $this->assertSame(
            '<textarea data-test="&lt;test&gt;"></textarea>',
            FormBuilder::textarea(null, [
                'data-test' => '<test>'
            ])
        );
    }

    public function testTextareaAttributeArray(): void
    {
        $this->assertSame(
            '<textarea data-test="[1,2]"></textarea>',
            FormBuilder::textarea(null, [
                'data-test' => [1, 2]
            ])
        );
    }

}
