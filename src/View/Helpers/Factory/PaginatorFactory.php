<?php
/**
 * @author Dimitar Dimitrov <daghostman.dd@gmail.com>
 */
namespace Onion\View\Helpers\Factory;

use Interop\Container\ContainerInterface;
use Zend\Paginator\Adapter\AdapterInterface;
use Zend\Paginator\AdapterAggregateInterface;
use Zend\Paginator\Paginator;

class PaginatorFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $adapter = null;
        if ($container->has(AdapterInterface::class)) {
            $adapter = $container->get(AdapterInterface::class);
        }

        if ($container->has(AdapterAggregateInterface::class)) {
            $adapter = $container->get(AdapterAggregateInterface::class);
        }

        if (null === $adapter) {
            throw new \RuntimeException(
                'No implementation of \Zend\Paginator\Adapter\AdapterInterface or' .
                    '\Zend\Paginator\Adapter\AdapterAggregateInterface registered'
            );
        }
        return new Paginator($adapter);
    }
}
