<?php
namespace Airlance\Framework\Cron;

/**
 * JobInterface
 *
 * @author ReSoul <roberts.mark1985@gmail.com>
 * @since 1.0
 */
interface JobInterface
{
    public function execute();
}