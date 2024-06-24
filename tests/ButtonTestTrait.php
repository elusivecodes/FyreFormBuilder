<?php
declare(strict_types=1);

namespace Tests;

use Fyre\Form\FormBuilder;

trait ButtonTestTrait
{
    public function testButton(): void
    {
        $this->assertSame(
            '<button type="button"></button>',
            FormBuilder::button()
        );
    }

    public function testButtonAttributeArray(): void
    {
        $this->assertSame(
            '<button data-test="[1,2]" type="button"></button>',
            FormBuilder::button('', [
                'data-test' => [1, 2]
            ])
        );
    }

    public function testButtonAttributeEscape(): void
    {
        $this->assertSame(
            '<button data-test="&lt;test&gt;" type="button"></button>',
            FormBuilder::button('', [
                'data-test' => '<test>'
            ])
        );
    }

    public function testButtonAttributeInvalid(): void
    {
        $this->assertSame(
            '<button class="test" type="button"></button>',
            FormBuilder::button('', [
                '*class*' => 'test'
            ])
        );
    }

    public function testButtonAttributes(): void
    {
        $this->assertSame(
            '<button class="test" id="button" type="button"></button>',
            FormBuilder::button('', [
                'class' => 'test',
                'id' => 'button'
            ])
        );
    }

    public function testButtonAttributesOrder(): void
    {
        $this->assertSame(
            '<button class="test" id="button" type="button"></button>',
            FormBuilder::button('', [
                'id' => 'button',
                'class' => 'test'
            ])
        );
    }

    public function testButtonContent(): void
    {
        $this->assertSame(
            '<button type="button">Test</button>',
            FormBuilder::button('Test')
        );
    }

    public function testButtonContentEscape(): void
    {
        $this->assertSame(
            '<button type="button">&lt;i&gt;Test&lt;/i&gt;</button>',
            FormBuilder::button('<i>Test</i>')
        );
    }

    public function testButtonContentNoEscape(): void
    {
        $this->assertSame(
            '<button type="button"><i>Test</i></button>',
            FormBuilder::button('<i>Test</i>', [
                'escape' => false
            ])
        );
    }
}
