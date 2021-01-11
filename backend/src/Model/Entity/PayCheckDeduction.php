<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PayCheckDeduction Entity
 *
 * @property int $id
 * @property int $pay_check_id
 * @property int $income_deduction_id
 * @property float $amount
 * @property int $position
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\PayCheck $pay_check
 * @property \App\Model\Entity\IncomeDeduction $income_deduction
 */
class PayCheckDeduction extends Entity
{
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
        'pay_check_id' => true,
        'income_deduction_id' => true,
        'amount' => true,
        'position' => true,
        'created' => true,
        'modified' => true,
        'pay_check' => true,
        'income_deduction' => true,
    ];
}
