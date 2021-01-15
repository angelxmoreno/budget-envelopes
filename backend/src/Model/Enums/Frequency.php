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
    public const SEMI_MONTHLY = 'semi-monthly';
    public const MONTHLY = 'monthly';
    public const YEARLY = 'yearly';

    protected const FREQUENCIES = [
        self::WEEKLY,
        self::BI_WEEKLY,
        self::SEMI_MONTHLY,
        self::MONTHLY,
        self::YEARLY,
    ];

    protected const PERIODS = [
        self::WEEKLY => 'P1W',
        self::BI_WEEKLY => 'P2W',
        self::SEMI_MONTHLY => 'P15D',
        self::MONTHLY => 'P1M',
        self::YEARLY => 'P1Y',
    ];

    public static function asList(): array
    {
        return array_combine(self::FREQUENCIES, self::FREQUENCIES);
    }

    /**
     * @param string $frequency
     * @return string
     * @throws \Exception
     */
    public static function toPeriod(string $frequency): string
    {
        if (!self::isValidFrequency($frequency)) {
            throw new \Exception("'{$frequency}' is not a valid frequency");
        }

        return self::PERIODS[$frequency];
    }

    public static function isValidFrequency(string $frequency): bool
    {
        return in_array($frequency, self::FREQUENCIES);
    }
}
