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
     * Check if a new job exist.
     */
    public function actionCheck()
    {
        $time = strtotime(date('Y-m-d H:i:s')) + 59;
        foreach (Job::find()->where(['status' => Status::STATUS_ACTIVE])->all() as $job) {
            $cron = new CronExpression($job->command);
            if ($time >= strtotime($cron->getNextRunDate()->format('Y-m-d H:i:s'))) {
                $command = 'php ' . ROOT_PATH . "/airlance cron/execute --job_id=$job->job_id &";
                exec($command);
            }
        }
    }

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