<?php
declare(strict_types=1);

namespace Tests;

trait LegendTestTrait
{
    public function testLegend(): void
    {
        $this->assertSame(
            '<legend></legend>',
            $this->form->legend()
        );
    }

    public function testLegendAttributeArray(): void
    {
        $this->assertSame(
            '<legend data-test="[1,2]"></legend>',
            $this->form->legend('', [
                'data-test' => [1, 2],
            ])
        );
    }

    public function testLegendAttributeEscape(): void
    {
        $this->assertSame(
            '<legend data-test="&lt;test&gt;"></legend>',
            $this->form->legend('', [
                'data-test' => '<test>',
            ])
        );
    }

    public function testLegendAttributeInvalid(): void
    {
        $this->assertSame(
            '<legend class="test"></legend>',
            $this->form->legend('', [
                '*class*' => 'test',
            ])
        );
    }

    public function testLegendAttributes(): void
    {
        $this->assertSame(
            '<legend class="test" id="legend"></legend>',
            $this->form->legend('', [
                'class' => 'test',
                'id' => 'legend',
            ])
        );
    }

    public function testLegendAttributesOrder(): void
    {
        $this->assertSame(
            '<legend class="test" id="legend"></legend>',
            $this->form->legend('', [
                'id' => 'legend',
                'class' => 'test',
            ])
        );
    }

    public function testLegendContent(): void
    {
        $this->assertSame(
            '<legend>Test</legend>',
            $this->form->legend('Test')
        );
    }

    public function testLegendContentEscape(): void
    {
        $this->assertSame(
            '<legend>&lt;i&gt;Test&lt;/i&gt;</legend>',
            $this->form->legend('<i>Test</i>')
        );
    }

    public function testLegendContentNoEscape(): void
    {
        $this->assertSame(
            '<legend><i>Test</i></legend>',
            $this->form->legend('<i>Test</i>', [
                'escape' => false,
            ])
        );
    }
}
