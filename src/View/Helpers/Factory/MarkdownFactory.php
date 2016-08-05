<?php
/**
 * @author Dimitar Dimitrov <daghostman.dd@gmail.com>
 */
namespace Onion\View\Helpers\Factory;

use Interop\Container\ContainerInterface;

use Onion\View\Helpers\Markdown;

class MarkdownFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get('config');
        $options = [];
        if (array_key_exists('markdown', $config)) {
            $options = $config['markdown'];
        }

        return new Markdown($container->get(\Parsedown::class), $options);
    }
}
