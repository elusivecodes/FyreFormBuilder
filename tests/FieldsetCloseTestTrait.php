<?php
declare(strict_types=1);

namespace Tests;

use Fyre\Form\FormBuilder;

trait FieldsetCloseTestTrait
{

    public function testFieldsetClose(): void
    {
        $this->assertSame(
            '</fieldset>',
            FormBuilder::fieldsetClose()
        );
    }

}
