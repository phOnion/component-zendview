<?php
/**
 * @author Dimitar Dimitrov <daghostman.dd@gmail.com>
 */
namespace Onion\View\Markdown;

class ExtendedParser extends \Parsedown
{
    protected $isAppendHostNameEnabled = false;

    /**
     * @param bool $append
     *
     * @return $this
     */
    public function appendUrlHostName($append = true)
    {
        $this->isAppendHostNameEnabled = $append;

        return $this;
    }

    public function inlineLink($Excerpt)
    {
        /**
         * @var $result array
         */
        $result = parent::inlineLink($Excerpt);

        if ($this->isAppendHostNameEnabled && is_array($result) &&
            !array_key_exists('host', parse_url($result['element']['text']))) {
                $info = parse_url($result['element']['attributes']['href'], PHP_URL_HOST);
                $result['element']['text'] .= ' (' . $info . ')';
        }

        return $result;
    }
}
