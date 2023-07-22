<?php
declare(strict_types=1);

namespace Tests;

use Fyre\Form\FormBuilder;

trait InputTestTrait
{

    public function testInput(): void
    {
        $this->assertSame(
            '<input type="text" />',
            FormBuilder::input()
        );
    }

    public function testInputName(): void
    {
        $this->assertSame(
            '<input name="input" type="text" />',
            FormBuilder::input('input')
        );
    }

    public function testInputAttributes(): void
    {
        $this->assertSame(
            '<input class="test" id="input" type="text" />',
            FormBuilder::input(null, [
                'class' => 'test',
                'id' => 'input'
            ])
        );
    }

    public function testInputAttributesOrder(): void
    {
        $this->assertSame(
            '<input class="test" id="input" type="text" />',
            FormBuilder::input(null, [
                'id' => 'input',
                'class' => 'test'
            ])
        );
    }

    public function testInputAttributeInvalid(): void
    {
        $this->assertSame(
            '<input class="test" type="text" />',
            FormBuilder::input(null, [
                '*class*' => 'test'
            ])
        );
    }

    public function testInputAttributeEscape(): void
    {
        $this->assertSame(
            '<input data-test="&lt;test&gt;" type="text" />',
            FormBuilder::input(null, [
                'data-test' => '<test>'
            ])
        );
    }

    public function testInputAttributeArray(): void
    {
        $this->assertSame(
            '<input data-test="[1,2]" type="text" />',
            FormBuilder::input(null, [
                'data-test' => [1, 2]
            ])
        );
    }

}
