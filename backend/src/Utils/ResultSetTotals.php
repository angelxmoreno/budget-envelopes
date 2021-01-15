<?php
declare(strict_types=1);

namespace App\Utils;

use App\Model\Entity\Bill;
use App\Model\Entity\CreditCard;
use App\Model\Entity\Loan;
use Cake\ORM\ResultSet;

/**
 * Class ResultSetTotals
 * @package App\Utils
 */
class ResultSetTotals
{
    /**
     * @param ResultSet|Bill[] $bills
     * @return Bill
     */
    public static function bills(ResultSet $bills): Bill
    {
        return new Bill([
            'amount' => $bills->sumOf('amount')
        ]);
    }

    /**
     * @param ResultSet|CreditCard[] $credit_cards
     * @return CreditCard
     */
    public static function creditCards(ResultSet $credit_cards): CreditCard
    {
        return new CreditCard([
            'apr' => $credit_cards->avg('apr'),
            'limit' => $credit_cards->sumOf('limit'),
            'balance' => $credit_cards->sumOf('balance'),
            'amount' => $credit_cards->sumOf('amount'),
            'interest_charge' => $credit_cards->sumOf('interest_charge'),
        ]);
    }

    /**
     * @param ResultSet|Loan[] $loans
     * @return Loan
     */
    public static function loans(ResultSet $loans): Loan
    {
        return new Loan([
            'apr' => $loans->avg('apr'),
            'amount' => $loans->sumOf('amount'),
            'terms' => $loans->avg('terms'),
        ]);
    }
}
