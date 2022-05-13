<?php
namespace Airlance\Framework\Console;

use yii\console\controllers\MigrateController as BaseMigrateController;
use Yii;

/**
 * MigrateController
 *
 * @author ReSoul <roberts.mark1985@gmail.com>
 * @since 1.0
 */
class MigrateController extends BaseMigrateController
{
    public $migrationPath = ['@app/migrations', __DIR__ . '/../Migration'];
}