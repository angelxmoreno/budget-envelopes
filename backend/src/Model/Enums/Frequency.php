<?php
declare(strict_types=1);

namespace App\Model\Enums;

/**
 * Class Frequency
 * @package App\Model\Enums
 */
class Frequency
{
    public const WEEKLY = 'weekly';
    public const BI_WEEKLY = 'bi-weekly';
    public const MONTHLY = 'monthly';
    public const BI_MONTHLY = 'bi-monthly';
    public const YEARLY = 'yearly';

    protected const FREQUENCIES = [
        self::WEEKLY,
        self::BI_WEEKLY,
        self::MONTHLY,
        self::BI_MONTHLY,
        self::YEARLY,
    ];

    public static function asList(): array
    {
        return array_combine(self::FREQUENCIES, self::FREQUENCIES);
    }
}
