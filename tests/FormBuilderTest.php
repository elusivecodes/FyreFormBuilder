<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\HTMLHelper\HtmlHelper,
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
        TextareaTest;

    protected function setUp(): void
    {
        HtmlHelper::setCharset('UTF-8');
    }

}
