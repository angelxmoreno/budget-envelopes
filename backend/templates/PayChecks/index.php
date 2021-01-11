<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PayCheck[]|\Cake\Collection\CollectionInterface $payChecks
 */
?>
<div class="payChecks index content">
    <?= $this->Html->link(__('New Pay Check'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pay Checks') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('pay_check_date') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('series') ?></th>
                <th><?= $this->Paginator->sort('gross') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($payChecks as $payCheck): ?>
                <tr>
                    <td><?= $this->Number->format($payCheck->id) ?></td>
                    <td><?= h($payCheck->pay_check_date) ?></td>
                    <td><?= h($payCheck->name) ?></td>
                    <td><?= $this->Number->format($payCheck->series) ?></td>
                    <td><?= $this->Number->format($payCheck->gross) ?></td>
                    <td><?= h($payCheck->created) ?></td>
                    <td><?= h($payCheck->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $payCheck->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $payCheck->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $payCheck->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $payCheck->id)]) ?>
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
