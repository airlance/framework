<?php
namespace Airlance\Framework\Db;

use yii\db\Migration as BaseMigration;

class Migration extends BaseMigration
{
    protected $table = '';

    protected $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

    public function down()
    {
        $this->dropTable($this->table);
    }
}