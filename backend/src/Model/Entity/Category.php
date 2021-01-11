<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $lft
 * @property int|null $rght
 * @property int|null $parent_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Category $parent_category
 * @property \App\Model\Entity\BudgetItem[] $budget_items
 * @property \App\Model\Entity\Category[] $child_categories
 * @property \App\Model\Entity\IncomeDeduction[] $income_deductions
 */
class Category extends Entity
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
        'lft' => true,
        'rght' => true,
        'parent_id' => true,
        'created' => true,
        'modified' => true,
        'parent_category' => true,
        'budget_items' => true,
        'child_categories' => true,
        'income_deductions' => true,
    ];
}
