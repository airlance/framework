<?php
namespace Airlance\Framework\Cron\Model;

use Airlance\Framework\Db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * Job
 *
 * @author ReSoul <roberts.mark1985@gmail.com>
 * @since 1.0
 */
class Job extends ActiveRecord
{
    public function behaviors(): array
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false
            ]
        ];
    }

    public static function tableName(): string
    {
        return '{{%cron}}';
    }

    public function rules(): array
    {
        return [
            [['object', 'method', 'command'], 'required'],
            [['object', 'method', 'command'], 'string'],
            [['status'], 'integer'],
        ];
    }
}