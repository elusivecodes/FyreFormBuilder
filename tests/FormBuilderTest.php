<?php
declare(strict_types=1);

namespace Tests;

use Fyre\Config\Config;
use Fyre\Form\FormBuilder;
use Fyre\Utility\HtmlHelper;
use Fyre\Utility\Traits\MacroTrait;
use PHPUnit\Framework\TestCase;

use function class_uses;

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
    use OpenMultipartTestTrait;
    use OpenTestTrait;
    use SelectMultiTestTrait;
    use SelectTestTrait;
    use TextareaTestTrait;

    protected FormBuilder $form;

    protected HtmlHelper $html;

    public function testMacroable(): void
    {
        $this->assertContains(
            MacroTrait::class,
            class_uses(FormBuilder::class)
        );
    }

    protected function setUp(): void
    {
        $config = new Config();
        $config->set('App.charset', 'UTF-8');

        $this->html = new HtmlHelper($config);
        $this->form = new FormBuilder($this->html);
    }
}
