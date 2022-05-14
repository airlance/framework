<?php

use Airlance\Framework\Db\Migration;

/**
 * Class m220101_223534_cron
 */
class m220101_223534_cron extends Migration
{
    protected $table = "{{%cron}}";

    public function up()
    {
        $this->createTable($this->table, [
            'job_id' => $this->primaryKey()->comment('Job ID'),
            'object' => $this->char(128)->notNull()->comment('Class Name'),
            'method' => $this->char(32)->notNull()->comment('Method'),
            'command' => $this->char(32)->notNull()->comment('Command'),
            'status' => $this->smallInteger(1)->defaultValue(1)->comment('Status'),
            'created_at' => $this->integer()->comment('Created At')
        ], $this->tableOptions);
    }
}