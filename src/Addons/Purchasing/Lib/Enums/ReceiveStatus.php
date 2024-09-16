<?php

namespace Obelaw\ERP\Addons\Purchasing\Lib\Enums;

enum ReceiveStatus: int
{
    case DRAFT = 0;
    case RECEIVED = 1;

    public static function status($value)
    {
        return match ($value) {
            self::DRAFT->value => 'Draft',
            self::RECEIVED->value => 'Received',
        };
    }

    public static function __callStatic($name, $args)
    {
        $name = strtoupper($name);

        if ($case = array_filter(static::cases(), fn ($case) => $case->name == $name))
            return current($case)->value;

        throw new \Exception('This product type does not exists');
    }
}