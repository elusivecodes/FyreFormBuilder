<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\FormBuilder\FormBuilder;

trait CloseTest
{

    public function testClose(): void
    {
        $this->assertSame(
            '</form>',
            FormBuilder::close()
        );
    }

}
