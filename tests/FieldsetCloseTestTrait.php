<?php
declare(strict_types=1);

namespace Tests;

trait FieldsetCloseTestTrait
{
    public function testFieldsetClose(): void
    {
        $this->assertSame(
            '</fieldset>',
            $this->form->fieldsetClose()
        );
    }
}
