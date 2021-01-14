<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PlaidCategory Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $grouping
 * @property int|null $lft
 * @property int|null $rght
 * @property int|null $parent_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class PlaidCategory extends Entity
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
        'id' => true,
        'name' => true,
        'grouping' => true,
        'lft' => true,
        'rght' => true,
        'parent_id' => true,
        'created' => true,
        'modified' => true,
    ];
}
