<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\Error\Exceptions\Exception,
    Fyre\FormBuilder\FormBuilder;

trait InputTypeTest
{

    public function testInputTypeName(): void
    {
        $this->assertSame(
            '<input name="number" type="number" />',
            FormBuilder::number('number')
        );
    }

    public function testInputTypeAttributes(): void
    {
        $this->assertSame(
            '<input class="test" id="number" name="number" type="number" />',
            FormBuilder::number('number', [
                'class' => 'test',
                'id' => 'number'
            ])
        );
    }

    public function testInputTypeInvalid(): void
    {
        $this->expectException(Exception::class);

        FormBuilder::invalid();
    }

    public function testInputTypeCheckbox(): void
    {
        $this->assertSame(
            '<input type="checkbox" />',
            FormBuilder::checkbox()
        );
    }

    public function testInputTypeColor(): void
    {
        $this->assertSame(
            '<input type="color" />',
            FormBuilder::color()
        );
    }

    public function testInputTypeDate(): void
    {
        $this->assertSame(
            '<input type="date" />',
            FormBuilder::date()
        );
    }

    public function testInputTypeDateTimeLocal(): void
    {
        $this->assertSame(
            '<input type="datetime-local" />',
            FormBuilder::datetime()
        );
    }

    public function testInputTypeEmail(): void
    {
        $this->assertSame(
            '<input type="email" />',
            FormBuilder::email()
        );
    }

    public function testInputTypeFile(): void
    {
        $this->assertSame(
            '<input type="file" />',
            FormBuilder::file()
        );
    }

    public function testInputTypeHidden(): void
    {
        $this->assertSame(
            '<input type="hidden" />',
            FormBuilder::hidden()
        );
    }

    public function testInputTypeImage(): void
    {
        $this->assertSame(
            '<input type="image" />',
            FormBuilder::image()
        );
    }

    public function testInputTypeMonth(): void
    {
        $this->assertSame(
            '<input type="month" />',
            FormBuilder::month()
        );
    }

    public function testInputTypeNumber(): void
    {
        $this->assertSame(
            '<input type="number" />',
            FormBuilder::number()
        );
    }

    public function testInputTypePassword(): void
    {
        $this->assertSame(
            '<input type="password" />',
            FormBuilder::password()
        );
    }

    public function testInputTypeRadio(): void
    {
        $this->assertSame(
            '<input type="radio" />',
            FormBuilder::radio()
        );
    }

    public function testInputTypeRange(): void
    {
        $this->assertSame(
            '<input type="range" />',
            FormBuilder::range()
        );
    }

    public function testInputTypeReset(): void
    {
        $this->assertSame(
            '<input type="reset" />',
            FormBuilder::reset()
        );
    }

    public function testInputTypeSearch(): void
    {
        $this->assertSame(
            '<input type="search" />',
            FormBuilder::search()
        );
    }

    public function testInputTypeSubmit(): void
    {
        $this->assertSame(
            '<input type="submit" />',
            FormBuilder::submit()
        );
    }

    public function testInputTypeTel(): void
    {
        $this->assertSame(
            '<input type="tel" />',
            FormBuilder::tel()
        );
    }

    public function testInputTypeText(): void
    {
        $this->assertSame(
            '<input type="text" />',
            FormBuilder::text()
        );
    }

    public function testInputTypeTime(): void
    {
        $this->assertSame(
            '<input type="time" />',
            FormBuilder::time()
        );
    }

    public function testInputTypeUrl(): void
    {
        $this->assertSame(
            '<input type="url" />',
            FormBuilder::url()
        );
    }

    public function testInputTypeWeek(): void
    {
        $this->assertSame(
            '<input type="week" />',
            FormBuilder::week()
        );
    }

}
