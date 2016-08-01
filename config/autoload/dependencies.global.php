<?php
/**
 * @author Dimitar Dimitrov <daghostman.dd@gmail.com>
 */

return [
    'dependencies' => [
        'factories' => [
            \Zend\Expressive\Template\TemplateRendererInterface::class =>
                Zend\Expressive\ZendView\ZendViewRendererFactory::class,
            \Zend\View\HelperPluginManager::class =>
                \Zend\Expressive\ZendView\HelperPluginManagerFactory::class,
            \Onion\View\Helpers\Markdown::class =>
                \Onion\View\Helpers\Factory\MarkdownFactory::class,
            \Zend\Paginator\Factory::class =>
                \Onion\View\Helpers\Factory\PaginatorFactory::class
        ]
    ]
];
