<?php
declare(strict_types=1);

namespace Tests;

use Fyre\Form\FormBuilder;

trait CloseTestTrait
{
    public function testClose(): void
    {
        $this->assertSame(
            '</form>',
            FormBuilder::close()
        );
    }
}
