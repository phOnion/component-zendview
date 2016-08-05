<?php
/**
 * @author Dimitar Dimitrov <daghostman.dd@gmail.com>
 */

namespace Helpers;


use Interop\Container\ContainerInterface;
use Onion\View\Helpers\Factory\MarkdownFactory;
use Onion\View\Helpers\Markdown;
use Onion\View\Markdown\ExtendedParser;

class MarkdownFactoryTest extends \PHPUnit_Framework_TestCase
{
    protected $factory;

    public function testFactoryWithDefaultConfiguration()
    {
        $container = $this->prophesize(ContainerInterface::class);
        $parserMock = $this->prophesize(ExtendedParser::class);
        $parserMock->setMarkupEscaped(true)->will(function () use ($parserMock) { return $parserMock->reveal(); });
        $parserMock->setBreaksEnabled(false)->will(function () use ($parserMock) { return $parserMock->reveal(); });
        $parserMock->setUrlsLinked(true)->will(function () use ($parserMock) { return $parserMock->reveal(); });
        $parserMock->appendUrlHostName(true)->will(function () use ($parserMock) { return $parserMock->reveal(); });
        $container->get('config')->willReturn(['markdown' => []]);
        $container->get(\Parsedown::class)->willReturn($parserMock->reveal());
        /**
         * @var $instance Markdown
         */
        $instance = call_user_func(new MarkdownFactory(), $container->reveal());

        $this->assertInstanceOf(Markdown::class, $instance);
    }
}
