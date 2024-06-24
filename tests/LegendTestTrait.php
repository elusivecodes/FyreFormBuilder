<?php
declare(strict_types=1);

namespace Tests;

use Fyre\Form\FormBuilder;

trait LegendTestTrait
{
    public function testLegend(): void
    {
        $this->assertSame(
            '<legend></legend>',
            FormBuilder::legend()
        );
    }

    public function testLegendAttributeArray(): void
    {
        $this->assertSame(
            '<legend data-test="[1,2]"></legend>',
            FormBuilder::legend('', [
                'data-test' => [1, 2]
            ])
        );
    }

    public function testLegendAttributeEscape(): void
    {
        $this->assertSame(
            '<legend data-test="&lt;test&gt;"></legend>',
            FormBuilder::legend('', [
                'data-test' => '<test>'
            ])
        );
    }

    public function testLegendAttributeInvalid(): void
    {
        $this->assertSame(
            '<legend class="test"></legend>',
            FormBuilder::legend('', [
                '*class*' => 'test'
            ])
        );
    }

    public function testLegendAttributes(): void
    {
        $this->assertSame(
            '<legend class="test" id="legend"></legend>',
            FormBuilder::legend('', [
                'class' => 'test',
                'id' => 'legend'
            ])
        );
    }

    public function testLegendAttributesOrder(): void
    {
        $this->assertSame(
            '<legend class="test" id="legend"></legend>',
            FormBuilder::legend('', [
                'id' => 'legend',
                'class' => 'test'
            ])
        );
    }

    public function testLegendContent(): void
    {
        $this->assertSame(
            '<legend>Test</legend>',
            FormBuilder::legend('Test')
        );
    }

    public function testLegendContentEscape(): void
    {
        $this->assertSame(
            '<legend>&lt;i&gt;Test&lt;/i&gt;</legend>',
            FormBuilder::legend('<i>Test</i>')
        );
    }

    public function testLegendContentNoEscape(): void
    {
        $this->assertSame(
            '<legend><i>Test</i></legend>',
            FormBuilder::legend('<i>Test</i>', [
                'escape' => false
            ])
        );
    }
}
