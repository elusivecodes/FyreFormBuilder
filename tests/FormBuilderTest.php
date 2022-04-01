<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\FormBuilder\FormBuilder,
    PHPUnit\Framework\TestCase;

final class FormBuilderTest extends TestCase
{

    use
        ButtonTest,
        CloseTest,
        FieldsetCloseTest,
        FieldSetOpenTest,
        InputTest,
        InputTypeTest,
        LabelTest,
        LegendTest,
        OpenTest,
        OpenMultipartTest,
        SelectTest,
        SelectMultiTest,
        TextAreaTest;

    protected function setUp(): void
    {
        FormBuilder::setCharset('UTF-8');
    }

}
