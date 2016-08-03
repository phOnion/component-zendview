<?php
/**
 * @author Dimitar Dimitrov <daghostman.dd@gmail.com>
 */

namespace Test\Helpers;


use Onion\View\Helpers\Markdown;

class MarkdownTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Markdown
     */
    protected $markdown;

    public function setUp()
    {
        $this->markdown = new Markdown();
    }

    public function testMarkdownParsing()
    {
        $this->assertSame('<p><strong>test</strong></p>', call_user_func($this->markdown, '**test**'));
    }
}
