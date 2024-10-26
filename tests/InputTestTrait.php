<?php
declare(strict_types=1);

namespace Tests;

trait InputTestTrait
{
    public function testInput(): void
    {
        $this->assertSame(
            '<input type="text" />',
            $this->form->input()
        );
    }

    public function testInputAttributeArray(): void
    {
        $this->assertSame(
            '<input data-test="[1,2]" type="text" />',
            $this->form->input(null, [
                'data-test' => [1, 2],
            ])
        );
    }

    public function testInputAttributeEscape(): void
    {
        $this->assertSame(
            '<input data-test="&lt;test&gt;" type="text" />',
            $this->form->input(null, [
                'data-test' => '<test>',
            ])
        );
    }

    public function testInputAttributeInvalid(): void
    {
        $this->assertSame(
            '<input class="test" type="text" />',
            $this->form->input(null, [
                '*class*' => 'test',
            ])
        );
    }

    public function testInputAttributes(): void
    {
        $this->assertSame(
            '<input class="test" id="input" type="text" />',
            $this->form->input(null, [
                'class' => 'test',
                'id' => 'input',
            ])
        );
    }

    public function testInputAttributesOrder(): void
    {
        $this->assertSame(
            '<input class="test" id="input" type="text" />',
            $this->form->input(null, [
                'id' => 'input',
                'class' => 'test',
            ])
        );
    }

    public function testInputName(): void
    {
        $this->assertSame(
            '<input name="input" type="text" />',
            $this->form->input('input')
        );
    }
}
