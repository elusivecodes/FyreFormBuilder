<?php
declare(strict_types=1);

namespace Tests;

trait ButtonTestTrait
{
    public function testButton(): void
    {
        $this->assertSame(
            '<button type="button"></button>',
            $this->form->button()
        );
    }

    public function testButtonAttributeArray(): void
    {
        $this->assertSame(
            '<button data-test="[1,2]" type="button"></button>',
            $this->form->button('', [
                'data-test' => [1, 2],
            ])
        );
    }

    public function testButtonAttributeEscape(): void
    {
        $this->assertSame(
            '<button data-test="&lt;test&gt;" type="button"></button>',
            $this->form->button('', [
                'data-test' => '<test>',
            ])
        );
    }

    public function testButtonAttributeInvalid(): void
    {
        $this->assertSame(
            '<button class="test" type="button"></button>',
            $this->form->button('', [
                '*class*' => 'test',
            ])
        );
    }

    public function testButtonAttributes(): void
    {
        $this->assertSame(
            '<button class="test" id="button" type="button"></button>',
            $this->form->button('', [
                'class' => 'test',
                'id' => 'button',
            ])
        );
    }

    public function testButtonAttributesOrder(): void
    {
        $this->assertSame(
            '<button class="test" id="button" type="button"></button>',
            $this->form->button('', [
                'id' => 'button',
                'class' => 'test',
            ])
        );
    }

    public function testButtonContent(): void
    {
        $this->assertSame(
            '<button type="button">Test</button>',
            $this->form->button('Test')
        );
    }

    public function testButtonContentEscape(): void
    {
        $this->assertSame(
            '<button type="button">&lt;i&gt;Test&lt;/i&gt;</button>',
            $this->form->button('<i>Test</i>')
        );
    }

    public function testButtonContentNoEscape(): void
    {
        $this->assertSame(
            '<button type="button"><i>Test</i></button>',
            $this->form->button('<i>Test</i>', [
                'escape' => false,
            ])
        );
    }
}
