<?php
declare(strict_types=1);

namespace Tests;

use BadMethodCallException;

trait InputTypeTestTrait
{
    public function testInputTypeAttributes(): void
    {
        $this->assertSame(
            '<input class="test" id="number" name="number" type="number" />',
            $this->form->number('number', [
                'class' => 'test',
                'id' => 'number',
            ])
        );
    }

    public function testInputTypeCheckbox(): void
    {
        $this->assertSame(
            '<input type="checkbox" />',
            $this->form->checkbox()
        );
    }

    public function testInputTypeColor(): void
    {
        $this->assertSame(
            '<input type="color" />',
            $this->form->color()
        );
    }

    public function testInputTypeDate(): void
    {
        $this->assertSame(
            '<input type="date" />',
            $this->form->date()
        );
    }

    public function testInputTypeDateTimeLocal(): void
    {
        $this->assertSame(
            '<input type="datetime-local" />',
            $this->form->datetime()
        );
    }

    public function testInputTypeEmail(): void
    {
        $this->assertSame(
            '<input type="email" />',
            $this->form->email()
        );
    }

    public function testInputTypeFile(): void
    {
        $this->assertSame(
            '<input type="file" />',
            $this->form->file()
        );
    }

    public function testInputTypeHidden(): void
    {
        $this->assertSame(
            '<input type="hidden" />',
            $this->form->hidden()
        );
    }

    public function testInputTypeImage(): void
    {
        $this->assertSame(
            '<input type="image" />',
            $this->form->image()
        );
    }

    public function testInputTypeInvalid(): void
    {
        $this->expectException(BadMethodCallException::class);

        $this->form->invalid();
    }

    public function testInputTypeMonth(): void
    {
        $this->assertSame(
            '<input type="month" />',
            $this->form->month()
        );
    }

    public function testInputTypeName(): void
    {
        $this->assertSame(
            '<input name="number" type="number" />',
            $this->form->number('number')
        );
    }

    public function testInputTypeNumber(): void
    {
        $this->assertSame(
            '<input type="number" />',
            $this->form->number()
        );
    }

    public function testInputTypePassword(): void
    {
        $this->assertSame(
            '<input type="password" />',
            $this->form->password()
        );
    }

    public function testInputTypeRadio(): void
    {
        $this->assertSame(
            '<input type="radio" />',
            $this->form->radio()
        );
    }

    public function testInputTypeRange(): void
    {
        $this->assertSame(
            '<input type="range" />',
            $this->form->range()
        );
    }

    public function testInputTypeReset(): void
    {
        $this->assertSame(
            '<input type="reset" />',
            $this->form->reset()
        );
    }

    public function testInputTypeSearch(): void
    {
        $this->assertSame(
            '<input type="search" />',
            $this->form->search()
        );
    }

    public function testInputTypeSubmit(): void
    {
        $this->assertSame(
            '<input type="submit" />',
            $this->form->submit()
        );
    }

    public function testInputTypeTel(): void
    {
        $this->assertSame(
            '<input type="tel" />',
            $this->form->tel()
        );
    }

    public function testInputTypeText(): void
    {
        $this->assertSame(
            '<input type="text" />',
            $this->form->text()
        );
    }

    public function testInputTypeTime(): void
    {
        $this->assertSame(
            '<input type="time" />',
            $this->form->time()
        );
    }

    public function testInputTypeUrl(): void
    {
        $this->assertSame(
            '<input type="url" />',
            $this->form->url()
        );
    }

    public function testInputTypeWeek(): void
    {
        $this->assertSame(
            '<input type="week" />',
            $this->form->week()
        );
    }
}
