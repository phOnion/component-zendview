<?php
/**
 * @author Dimitar Dimitrov <daghostman.dd@gmail.com>
 */

namespace Markdown;


use Onion\View\Markdown\ExtendedParser;

class ExtendedParserTest extends \PHPUnit_Framework_TestCase
{
    public function testUrlHostnameAppending()
    {
        $parser = new ExtendedParser();
        $this->assertInstanceOf(ExtendedParser::class, $parser->appendUrlHostName(true));
        $this->assertSame(
            '<p><a href="https://google.com">https://google.com</a></p>',
            $parser->parse('https://google.com'),
            'Don\'t append to auto linked urls'
        );
        $this->assertSame(
            '<p><a href="https://google.com">Google (google.com)</a></p>',
            $parser->parse('[Google](https://google.com)'),
            'Append to urls, which have named text'
        );
    }
}
