<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\FormBuilder\FormBuilder;

trait FieldsetCloseTest
{

    public function testFieldsetClose(): void
    {
        $this->assertSame(
            '</fieldset>',
            FormBuilder::fieldsetClose()
        );
    }

}
