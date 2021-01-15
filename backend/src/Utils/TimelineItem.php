<?php
declare(strict_types=1);

namespace App\Utils;

use Cake\ORM\Entity;

/**
 * Class TimelineItem
 * @package App\Utils
 */
class TimelineItem implements \JsonSerializable
{
    /**
     * @var string
     */
    protected $group;

    /**
     * @var float
     */
    protected $amount;

    /**
     * @var Entity
     */
    protected $entity;

    /**
     * @var string
     */
    protected $type;

    /**
     * TimelineItem constructor.
     * @param string $group
     * @param float $amount
     * @param Entity $entity
     */
    public function __construct(string $group, float $amount, Entity $entity)
    {
        $this->group = $group;
        $this->amount = $amount;
        $this->entity = $entity;
        $this->type = get_class($entity);
    }

    /**
     * @return Entity
     */
    public function getEntity(): Entity
    {
        return $this->entity;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    public function jsonSerialize(): array
    {
        return [
            'group' => $this->getGroup(),
            'name' => $this->getName(),
            'amount' => number_format($this->getAmount(), 2),
            'is_auto_paid' => $this->getEntity()->get('is_auto_paid')
        ];
    }

    /**
     * @return string
     */
    public function getGroup(): string
    {
        return $this->group;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->getEntity()->get('name');
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }
}
