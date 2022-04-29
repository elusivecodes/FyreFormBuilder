<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\FormBuilder\FormBuilder,
    Fyre\HTMLHelper\HtmlHelper;

trait OpenMultipartTest
{

    public function testOpenMultipart(): void
    {
        $this->assertSame(
            '<form method="post" enctype="multipart/form-data" charset="UTF-8">',
            FormBuilder::openMultipart()
        );
    }

    public function testOpenMultipartAction(): void
    {
        $this->assertSame(
            '<form action="/test" method="post" enctype="multipart/form-data" charset="UTF-8">',
            FormBuilder::openMultipart('/test')
        );
    }

    public function testOpenMultipartCharset(): void
    {
        HtmlHelper::setCharset('ISO-8859-1');

        $this->assertSame(
            '<form method="post" enctype="multipart/form-data" charset="ISO-8859-1">',
            FormBuilder::openMultipart()
        );
    }

    public function testOpenMultipartAttributes(): void
    {
        $this->assertSame(
            '<form class="test" id="form" method="post" enctype="multipart/form-data" charset="UTF-8">',
            FormBuilder::openMultipart(null, [
                'class' => 'test',
                'id' => 'form'
            ])
        );
    }

    public function testOpenMultipartAttributesOrder(): void
    {
        $this->assertSame(
            '<form class="test" id="form" method="post" enctype="multipart/form-data" charset="UTF-8">',
            FormBuilder::openMultipart(null, [
                'id' => 'form',
                'class' => 'test'
            ])
        );
    }

    public function testOpenMultipartAttributeInvalid(): void
    {
        $this->assertSame(
            '<form class="test" method="post" enctype="multipart/form-data" charset="UTF-8">',
            FormBuilder::openMultipart(null, [
                '*class*' => 'test'
            ])
        );
    }

    public function testOpenMultipartAttributeEscape(): void
    {
        $this->assertSame(
            '<form data-test="&lt;test&gt;" method="post" enctype="multipart/form-data" charset="UTF-8">',
            FormBuilder::openMultipart(null, [
                'data-test' => '<test>'
            ])
        );
    }

    public function testOpenMultipartAttributeArray(): void
    {
        $this->assertSame(
            '<form data-test="[1,2]" method="post" enctype="multipart/form-data" charset="UTF-8">',
            FormBuilder::openMultipart(null, [
                'data-test' => [1, 2]
            ])
        );
    }

}
