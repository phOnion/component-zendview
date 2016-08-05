<?php
/**
 * @author Dimitar Dimitrov <daghostman.dd@gmail.com>
 */

namespace Test\Helpers;


use Onion\View\Helpers\Markdown;
use Onion\View\Markdown\ExtendedParser;

class MarkdownTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Markdown
     */
    protected $markdown;

    public function setUp()
    {
        $this->markdown = new Markdown(new ExtendedParser());
    }

    public function testMarkdownParsing()
    {
        $this->assertSame('<p><strong>test</strong></p>', call_user_func($this->markdown, '**test**'));
    }

    public function testDefaultOptionsFunctionality()
    {
        $this->assertSame(
            '<p><strong>test</strong></p>',
            call_user_func($this->markdown, "**test**\n\n\n")
        );
        $this->assertSame(
            '<p><a href="https://google.com">https://google.com</a></p>',
            call_user_func($this->markdown, "https://google.com")
        );
        $this->assertSame(
            '<p>&lt;script&gt;alert(&quot;hello&quot;);&lt;/script&gt;</p>',
            call_user_func($this->markdown, '<script>alert("hello");</script>')
        );
    }

    public function testWithEscapeDisabled()
    {
        $md = new Markdown(new ExtendedParser(), ['escape' => false]);
        $this->assertSame(
            '<p><strong>test</strong></p>',
            call_user_func($md, '<strong>test</strong>')
        );
    }

    public function testWithBreaksEnabled()
    {
        $md = new Markdown(new ExtendedParser(), ['breaks' => true]);
        $this->assertSame(
            "<p><strong>test</strong><br />\n<em>Yes</em></p>",
            call_user_func($md, "**test**\n*Yes*")
        );
    }
}
