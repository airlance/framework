<?php
namespace Airlance\Framework\Cron;

use Cron\CronExpression;
use Airlance\Framework\Source\Status;
use Airlance\Framework\Cron\Model\Job;
use yii\console\Controller;
use Yii;

/**
 * JobInterface
 *
 * @author ReSoul <roberts.mark1985@gmail.com>
 * @since 1.0
 */
class JobController extends Controller
{
    public $job_id;

    /**
     * Execute process.
     */
    public function actionExecute()
    {
        if (($job = Job::findOne($this->job_id)) !== null) {
            $object = Yii::createObject($job->object);
            if ($object instanceof JobInterface) {
                $object->{$job->method}();
            }
        }
    }

    public function options($actionID)
    {
        return ['job_id'];
    }
}