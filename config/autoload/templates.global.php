<?php
/**
 * @author Dimitar Dimitrov <daghostman.dd@gmail.com>
 */

return [
    'templates' => [
        'layout'    => 'default',
        'paths'     => [
            'error' => 'templates/error'
        ]
    ],
    'view_helpers'      => [
        'aliases'       => [],
        'invokables'    => [
            'navigation'    => \Zend\Navigation\Service\NavigationAbstractServiceFactory::class,
            'pagination'    => \Zend\Paginator\Paginator::class,
            'markdown'      => \Onion\View\Helpers\Markdown::class
        ]
    ]
];
