<?php

namespace App\Enum;

use MyCLabs\Enum\Enum;

/**
 * MediaType
 *
 * @author  Ilgner Fagundes <ilgner552@gmail.com>
 * @version 1.0
 *
 * @method static MediaType MALE()
 * @method static MediaType FAMELE()
 */
class MediaType extends Enum
{
    //situations
    const IMAGE = 'image';
    const GIF = 'gif';
    const VIDEO = 'video';

    /** @var array */
    protected static $captions = [
        self::IMAGE => 'Imagem',
        self::GIF => 'Video',
        self::VIDEO => 'Gif',
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