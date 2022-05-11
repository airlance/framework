<?php
namespace Airlance\Framework\Cron;

use Airlance\Framework\Cron\Model\Job;

/**
 * CronProvider
 *
 * @author ReSoul <roberts.mark1985@gmail.com>
 * @since 1.0
 */
class CronProvider
{
    protected $jobInstance;

    public function __construct(Job $job)
    {
        $this->jobInstance = $job;
    }

    public function setObject($value)
    {
        $this->jobInstance->setAttribute('object', $value);
    }

    public function setMethod($value)
    {
        $this->jobInstance->setAttribute('method', $value);
    }

    public function setStatus($value)
    {
        $this->jobInstance->setAttribute('status', $value);
    }

    public function setCommand($value)
    {
        $this->jobInstance->setAttribute('command', $value);
    }
}