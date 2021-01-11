<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PayCheck Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate|null $pay_check_date
 * @property string $name
 * @property int $series
 * @property float $gross
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\PayCheckBudget[] $pay_check_budgets
 * @property \App\Model\Entity\PayCheckDeduction[] $pay_check_deductions
 */
class PayCheck extends Entity
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
        'pay_check_date' => true,
        'name' => true,
        'series' => true,
        'gross' => true,
        'created' => true,
        'modified' => true,
        'pay_check_budgets' => true,
        'pay_check_deductions' => true,
    ];
}
