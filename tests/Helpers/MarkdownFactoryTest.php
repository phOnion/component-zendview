<?php
/**
 * @author Dimitar Dimitrov <daghostman.dd@gmail.com>
 */

namespace Helpers;


use Interop\Container\ContainerInterface;
use Onion\View\Helpers\Factory\MarkdownFactory;
use Onion\View\Helpers\Markdown;

class MarkdownFactoryTest extends \PHPUnit_Framework_TestCase
{
    protected $factory;

    public function testFactoryWithDefaultConfiguration()
    {
        $container = $this->prophesize(ContainerInterface::class);
        $container->get('config')->willReturn(['markdown' => []]);
        /**
         * @var $instance Markdown
         */
        $instance = call_user_func(new MarkdownFactory(), $container->reveal());

        $this->assertInstanceOf(Markdown::class, $instance);
        $this->assertSame('<p>test</p>', call_user_func($instance, 'test'));
        $this->assertSame("<p>Hello\nWorld</p>", call_user_func($instance, "Hello\nWorld"));
        $this->assertSame(
            '<p>&lt;script&gt;alert(&quot;test&quot;)&lt;/script&gt;</p>',
            call_user_func($instance, '<script>alert("test")</script>')
        );
        $this->assertSame(
            '<p><a href="https://google.com">https://google.com</a></p>',
            call_user_func($instance, 'https://google.com')
        );
    }
}
