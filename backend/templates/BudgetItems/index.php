<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BudgetItem[]|\Cake\Collection\CollectionInterface $budgetItems
 */
?>
<div class="budgetItems index content">
    <?= $this->Html->link(__('New Budget Item'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Budget Items') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('category_id') ?></th>
                <th><?= $this->Paginator->sort('budget_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('amount') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($budgetItems as $budgetItem): ?>
                <tr>
                    <td><?= $this->Number->format($budgetItem->id) ?></td>
                    <td><?= $budgetItem->has('category') ? $this->Html->link($budgetItem->category->name,
                            ['controller' => 'Categories', 'action' => 'view', $budgetItem->category->id]) : '' ?></td>
                    <td><?= $budgetItem->has('budget') ? $this->Html->link($budgetItem->budget->id,
                            ['controller' => 'Budgets', 'action' => 'view', $budgetItem->budget->id]) : '' ?></td>
                    <td><?= h($budgetItem->name) ?></td>
                    <td><?= $this->Number->format($budgetItem->amount) ?></td>
                    <td><?= h($budgetItem->created) ?></td>
                    <td><?= h($budgetItem->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $budgetItem->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $budgetItem->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $budgetItem->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $budgetItem->id)]) ?>
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
