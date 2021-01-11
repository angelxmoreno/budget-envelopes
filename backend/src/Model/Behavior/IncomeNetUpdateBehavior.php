<?php
declare(strict_types=1);

namespace App\Model\Behavior;

use App\Model\Entity\Income;
use App\Model\Entity\IncomeDeduction;
use App\Model\Table\IncomeDeductionsTable;
use App\Model\Table\IncomesTable;
use Cake\Core\Exception\Exception;
use Cake\Datasource\EntityInterface;
use Cake\Event\EventInterface;
use Cake\ORM\Behavior;

/**
 * IncomeNetUpdate behavior
 */
class IncomeNetUpdateBehavior extends Behavior
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function initialize(array $config): void
    {
        parent::initialize($config);
        if (!($this->table() instanceof IncomesTable) && !($this->table() instanceof IncomeDeductionsTable)) {
            throw new Exception("Only IncomesTable or IncomeDeductionsTable can use the IncomeNetUpdate Behavior");
        }
    }

    /**
     * @param EventInterface $event
     * @param EntityInterface $entity
     * @param \ArrayObject $options
     */
    public function afterSave(EventInterface $event, EntityInterface $entity, \ArrayObject $options)
    {
        if ($entity instanceof Income && $entity->id) {
            $this->updateNetForIncome($entity->id);
        }

        if ($entity instanceof IncomeDeduction && $entity->income_id) {
            $this->updateNetForIncome($entity->income_id);
        }
    }

    protected function updateNetForIncome(int $income_id)
    {
        /** @var Income $income */
        $income = $this->getIncomesTable()->get($income_id, [
            'contain' => 'IncomeDeductions'
        ]);

        $this->getIncomesTable()->
        query()
            ->update()
            ->set('Incomes.net', $income->gross - $income->total_deductions)
            ->where([
                'Incomes.id' => $income_id
            ])->execute();
    }

    /**
     * @return IncomesTable
     */
    protected function getIncomesTable()
    {
        /** @var IncomesTable|IncomeDeductionsTable $table */
        $table = $this->table();

        return $table instanceof IncomesTable
            ? $table
            : $table->Incomes;
    }

    /**
     * @return IncomeDeductionsTable
     */
    protected function getIncomeDeductionsTable()
    {
        /** @var IncomesTable|IncomeDeductionsTable $table */
        $table = $this->table();

        return $table instanceof IncomeDeductionsTable
            ? $table
            : $table->IncomeDeductions;
    }
}
