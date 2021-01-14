<?php
declare(strict_types=1);

namespace App\Model\Entity;

use App\Utils\LoanPayments;
use Cake\ORM\Entity;

/**
 * Loan Entity
 *
 * @property int $id
 * @property string $issuer
 * @property string $name
 * @property string|null $url
 * @property string|null $img_url
 * @property float $apr
 * @property float $amount
 * @property \Cake\I18n\FrozenDate $date_issued
 * @property int $terms
 * @property \Cake\I18n\FrozenDate $due_date
 * @property bool $is_auto_paid
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Loan extends Entity
{
    protected $_virtual = ['monthly_payment'];

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'issuer' => true,
        'name' => true,
        'url' => true,
        'img_url' => true,
        'apr' => true,
        'amount' => true,
        'date_issued' => true,
        'terms' => true,
        'due_date' => true,
        'is_auto_paid' => true,
        'created' => true,
        'modified' => true,
    ];

    protected function _getMonthlyPayment(): ?float
    {
        try {
            $apr = $this->apr > 0 ? $this->apr / 100 / 12 : 0;
            return LoanPayments::calcPayment($this->amount, $this->terms, $apr);
        } catch (\Throwable $exception) {
            return null;
        }
    }
}
