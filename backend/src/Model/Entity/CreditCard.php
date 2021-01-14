<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CreditCard Entity
 *
 * @property int $id
 * @property string $issuer
 * @property string $name
 * @property string|null $url
 * @property string|null $img_url
 * @property float $apr
 * @property float $limit
 * @property float $balance
 * @property float $available
 * @property float $usage
 * @property \Cake\I18n\FrozenDate $due_date
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class CreditCard extends Entity
{

    protected $_virtual = ['available', 'usage'];
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
        'limit' => true,
        'balance' => true,
        'due_date' => true,
        'created' => true,
        'modified' => true,
    ];

    protected function _getAvailable(): float
    {
        return $this->limit - $this->balance;
    }

    protected function _getUsage(): float
    {
        return $this->limit == 0
            ? 0
            : $this->balance / $this->limit * 100;
    }
}
