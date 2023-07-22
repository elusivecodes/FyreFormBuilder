<?php
declare(strict_types=1);

namespace Tests;

use Fyre\Utility\HtmlHelper;
use PHPUnit\Framework\TestCase;

final class FormBuilderTest extends TestCase
{

    use ButtonTestTrait;
    use CloseTestTrait;
    use FieldsetCloseTestTrait;
    use FieldSetOpenTestTrait;
    use InputTestTrait;
    use InputTypeTestTrait;
    use LabelTestTrait;
    use LegendTestTrait;
    use OpenTestTrait;
    use OpenMultipartTestTrait;
    use SelectTestTrait;
    use SelectMultiTestTrait;
    use TextareaTestTrait;

    protected function setUp(): void
    {
        HtmlHelper::setCharset('UTF-8');
    }

}
