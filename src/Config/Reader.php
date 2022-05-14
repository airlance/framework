<?php
namespace Airlance\Framework\Config;

use Airlance\Framework\Config\Reader\XML;

/**
 * Reader
 *
 * @author ReSoul <roberts.mark1985@gmail.com>
 * @since 1.0
 */
class Reader implements ReaderInterface
{
    private $xml;

    public function __construct()
    {
        $this->xml = new XML;
    }
}