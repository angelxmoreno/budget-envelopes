<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IncomeDeduction[]|\Cake\Collection\CollectionInterface $incomeDeductions
 */
?>
<div class="incomeDeductions index content">
    <?= $this->Html->link(__('New Income Deduction'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Income Deductions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('category_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('amount') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($incomeDeductions as $incomeDeduction): ?>
                <tr>
                    <td><?= $incomeDeduction->has('category') ? $this->Html->link($incomeDeduction->category->name, [
                            'controller' => 'Categories',
                            'action' => 'view',
                            $incomeDeduction->category->id
                        ]) : '' ?></td>
                    <td><?= h($incomeDeduction->name) ?></td>
                    <td><?= $this->Number->format($incomeDeduction->amount) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $incomeDeduction->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $incomeDeduction->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $incomeDeduction->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $incomeDeduction->id)]) ?>
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
