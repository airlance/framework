<?php
namespace Airlance\Framework\Resource;

use Yii;
/**
 * ResourceProvider
 *
 * @author ReSoul <roberts.mark1985@gmail.com>
 * @since 1.0
 */
class ResourceProvider
{
    protected $resource;

    private $arguments;

    private $_validate = true;

    public function __construct(ResourceInterface $resource, $arguments)
    {
        $this->resource = $resource;
        $this->arguments = $arguments;
    }

    public function createRecord()
    {
        if (!$this->resource->load($this->arguments) && !$this->resource->validate()) {
            return $this->resource->getErrors();
        }

        if (!$this->resource->save($this->_validate) && $this->resource->hasErrors()) {
            return $this->resource->getErrors();
        }

        return $this->resource->getPrimaryKey();
    }

    public function bulkInsert($column = [])
    {
        $table_name = forward_static_call([get_class($this->resource), 'tableName']);

        $command = Yii::$app->db->createCommand();
        $command->batchInsert($table_name, $column, $this->arguments);
        $command->execute();
    }

    public function runValidation($validate)
    {
        $this->_validate = $validate;
    }
}