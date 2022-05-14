<?php
namespace Airlance\Framework\Resource;

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

    public function runValidation($validate)
    {
        $this->_validate = $validate;
    }
}