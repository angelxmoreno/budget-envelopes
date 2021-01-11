<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Income Entity
 *
 * @property int $id
 * @property string|null $name
 * @property float $gross
 * @property string $frequency
 * @property \Cake\I18n\FrozenDate|null $first_pay_check_date
 * @property float|null $net
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\IncomeDeduction[] $income_deductions
 * @property float $total_deductions
 */
class Income extends Entity
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
        'name' => true,
        'gross' => true,
        'frequency' => true,
        'first_pay_check_date' => true,
        'net' => true,
        'created' => true,
        'modified' => true,
        'income_deductions' => true,
    ];

    protected function _getTotalDeductions()
    {
        $sum = null;
        $income_deductions = $this->associatedDeductions();
        foreach ($income_deductions as $income_deduction) {
            $sum = $sum + $income_deduction->amount;
        }
        return $sum;
    }

    /**
     * @return IncomeDeduction[]|\Cake\Datasource\ResultSetInterface
     */
    protected function associatedDeductions()
    {
        $deductions = $this->income_deductions ?? [];
        if (count($deductions) === 0 && $this->id) {
            $deductions = TableRegistry::getTableLocator()
                ->get('IncomeDeductions')
                ->find()->where([
                    'IncomeDeductions.income_id' => $this->id
                ])->all()->toArray();
        }

        return $deductions;
    }
}
