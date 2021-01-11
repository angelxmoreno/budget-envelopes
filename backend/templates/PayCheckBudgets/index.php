<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PayCheckBudget[]|\Cake\Collection\CollectionInterface $payCheckBudgets
 */
?>
<div class="payCheckBudgets index content">
    <?= $this->Html->link(__('New Pay Check Budget'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pay Check Budgets') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('pay_check_id') ?></th>
                <th><?= $this->Paginator->sort('budget_item_id') ?></th>
                <th><?= $this->Paginator->sort('amount') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($payCheckBudgets as $payCheckBudget): ?>
                <tr>
                    <td><?= $this->Number->format($payCheckBudget->id) ?></td>
                    <td><?= $payCheckBudget->has('pay_check') ? $this->Html->link($payCheckBudget->pay_check->name, [
                            'controller' => 'PayChecks',
                            'action' => 'view',
                            $payCheckBudget->pay_check->id
                        ]) : '' ?></td>
                    <td><?= $payCheckBudget->has('budget_item') ? $this->Html->link($payCheckBudget->budget_item->name,
                            [
                                'controller' => 'BudgetItems',
                                'action' => 'view',
                                $payCheckBudget->budget_item->id
                            ]) : '' ?></td>
                    <td><?= $this->Number->format($payCheckBudget->amount) ?></td>
                    <td><?= h($payCheckBudget->created) ?></td>
                    <td><?= h($payCheckBudget->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $payCheckBudget->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $payCheckBudget->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $payCheckBudget->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $payCheckBudget->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
