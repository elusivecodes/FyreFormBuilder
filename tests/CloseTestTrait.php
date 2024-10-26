<?php
declare(strict_types=1);

namespace Tests;

trait CloseTestTrait
{
    public function testClose(): void
    {
        $this->assertSame(
            '</form>',
            $this->form->close()
        );
    }
}
