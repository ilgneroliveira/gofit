<?php

namespace App\Enum;

use MyCLabs\Enum\Enum;

/**
 * AvailableTimeType
 *
 * @author  Ilgner Fagundes <ilgner552@gmail.com>
 * @version 1.0
 *
 * @method static AvailableTimeType FROM0TO10()
 * @method static AvailableTimeType FROM10TO30()
 * @method static AvailableTimeType FROM30TO60()
 * @method static AvailableTimeType MORETHAN60()
 */
class AvailableTimeType extends Enum
{
    const FROM0TO10 = '1';
    const FROM10TO30 = '2';
    const FROM30TO60 = '3';
    const MORETHAN60 = '4';

    /** @var array */
    protected static $captions = [
        self::FROM0TO10 => 'de 0 a 10 minutos',
        self::FROM10TO30 => 'de 10 a 30 minutos',
        self::FROM30TO60 => 'de 30 a 60 minutos',
        self::FROM30TO60 => '60 minutos ou mais',
    ];

    /**
     * Returns an array with enum captions indexed by enum keys
     * @return array
     */
    public static function captions()
    {
        return self::$captions;
    }
}