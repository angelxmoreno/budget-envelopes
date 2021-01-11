<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Income[]|\Cake\Collection\CollectionInterface $incomes
 */
?>
<div class="incomes index content">
    <?= $this->Html->link(__('New Income'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Incomes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('frequency') ?></th>
                <th><?= $this->Paginator->sort('gross') ?></th>
                <th><?= $this->Paginator->sort('first_pay_check_date') ?></th>
                <th><?= $this->Paginator->sort('net') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($incomes as $income): ?>
                <tr>
                    <td><?= $this->Number->format($income->id) ?></td>
                    <td><?= h($income->name) ?></td>
                    <td><?= h($income->frequency) ?></td>
                    <td><?= $this->Number->format($income->gross) ?></td>
                    <td><?= h($income->first_pay_check_date) ?></td>
                    <td><?= $this->Number->format($income->net) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $income->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $income->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $income->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $income->id)]) ?>
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
