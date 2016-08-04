<?php
/**
 * @author Dimitar Dimitrov <daghostman.dd@gmail.com>
 */
namespace Onion\View\Helpers;

use Zend\View\Helper\AbstractHelper;

class Markdown extends AbstractHelper
{
    /**
     * @var \Parsedown
     */
    protected $parser;

    protected $defaultOptions = [
        'breaks'    => false,
        'escape'    => true,
        'linkUrls'  => true
    ];

    public function __construct(array $options = [])
    {
        $this->parser = new \Parsedown();
        $options = array_merge($this->defaultOptions, $options);
        $this->parser->setBreaksEnabled($options['breaks'])
            ->setMarkupEscaped($options['escape'])
            ->setUrlsLinked($options['linkUrls']);
    }

    public function __invoke($string)
    {
        return $this->parser->text($string);
    }
}
