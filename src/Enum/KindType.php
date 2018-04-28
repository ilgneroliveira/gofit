<?php

namespace App\Enum;

use MyCLabs\Enum\Enum;

/**
 * KindType
 *
 * @author  Ilgner Fagundes <ilgner552@gmail.com>
 * @version 1.0
 *
 * @method static KindType MALE()
 * @method static KindType FAMELE()
 */
class KindType extends Enum
{
    //situations
    const MALE = 'male';
    const FAMELE = 'famele';

    /** @var array */
    protected static $captions = [
        self::MALE => 'Masculino',
        self::FAMELE => 'Feminino',
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