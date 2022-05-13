<?php
namespace Airlance\Framework\Cron;

use Airlance\Framework\Cron\Model\Job;

/**
 * CronFactory
 *
 * @author ReSoul <roberts.mark1985@gmail.com>
 * @since 1.0
 */
class CronFactory
{
    public static function create(): CronProvider
    {
        return new CronProvider(new Job());
    }
}