<?php
declare(strict_types=1);

namespace App\Utils;

/**
 * Class LoanPayments
 * @package App\Utils
 */
class LoanPayments
{
    public static function calcPayment(float $loanAmount, int $totalPayments, float $interest): float
    {
        //***********************************************************
        //              INTEREST * ((1 + INTEREST) ^ TOTALPAYMENTS)
        // PMT = LOAN * -------------------------------------------
        //                  ((1 + INTEREST) ^ TOTALPAYMENTS) - 1
        //***********************************************************

        $value1 = $interest * pow((1 + $interest), $totalPayments);
        $value2 = pow((1 + $interest), $totalPayments) - 1;
        if ($value2 == 0) {
            return $loanAmount / $totalPayments;
        }
        return $loanAmount * ($value1 / $value2);
    }
}
