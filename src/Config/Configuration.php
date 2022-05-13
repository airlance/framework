<?php
namespace Airlance\Framework\Config;

/**
 * Configuration
 *
 * @author ReSoul <roberts.mark1985@gmail.com>
 * @since 1.0
 */
class Configuration
{
    private $applicationConfig;

    public function __construct(ApplicationInterface $applicationConfig)
    {
        $this->applicationConfig = $applicationConfig;
    }

    public function initialization(): array
    {
        return $this->applicationConfig->getConfig();
    }
}