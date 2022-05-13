<?php
namespace Airlance\Framework\Source;

class Status
{
    const STATUS_NOT_ACTIVE = 0;

    const STATUS_ACTIVE = 1;

    public static function getStatuses() : array
    {
        return [
            self::STATUS_NOT_ACTIVE => 'Not Active',
            self::STATUS_ACTIVE => 'Active'
        ];
    }
}