<?php
namespace Airlance\Framework\Resource;

/**
 * ResourceFactory
 *
 * @author ReSoul <roberts.mark1985@gmail.com>
 * @since 1.0
 */
class ResourceFactory
{
    public static function create(ResourceInterface $resource, $arguments = []): ResourceProvider
    {
        return new ResourceProvider($resource, $arguments);
    }
}