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
        'breaks'        => false,
        'escape'        => true,
        'linkUrls'      => true,
        'appendUrlHost' => true
    ];

    public function __construct(\Parsedown $parser, array $options = [])
    {
        $this->parser = $parser;
        $options = array_merge($this->defaultOptions, $options);
        $this->parser->setBreaksEnabled($options['breaks'])
            ->setMarkupEscaped($options['escape'])
            ->setUrlsLinked($options['linkUrls']);

        if ($options['appendUrlHost'] === true && method_exists($this->parser, 'appendUrlHostName')) {
            $this->parser->appendUrlHostName($options['appendUrlHost']);
        }
    }

    public function __invoke($string)
    {
        return $this->parser->text($string);
    }
}
