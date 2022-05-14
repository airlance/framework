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

    private $configReader;

    public function __construct(ApplicationInterface $applicationConfig, ReaderInterface $reader)
    {
        $this->applicationConfig = $applicationConfig;
        $this->configReader = $reader;
    }

    public function initialization(): array
    {
        $this->applicationConfig->setReader($this->configReader);
        return $this->applicationConfig->getConfig();
    }
}