<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PayCheckDeduction[]|\Cake\Collection\CollectionInterface $payCheckDeductions
 */
?>
<div class="payCheckDeductions index content">
    <?= $this->Html->link(__('New Pay Check Deduction'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pay Check Deductions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('pay_check_id') ?></th>
                <th><?= $this->Paginator->sort('income_deduction_id') ?></th>
                <th><?= $this->Paginator->sort('amount') ?></th>
                <th><?= $this->Paginator->sort('position') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($payCheckDeductions as $payCheckDeduction): ?>
                <tr>
                    <td><?= $this->Number->format($payCheckDeduction->id) ?></td>
                    <td><?= $payCheckDeduction->has('pay_check') ? $this->Html->link($payCheckDeduction->pay_check->name,
                            [
                                'controller' => 'PayChecks',
                                'action' => 'view',
                                $payCheckDeduction->pay_check->id
                            ]) : '' ?></td>
                    <td><?= $payCheckDeduction->has('income_deduction') ? $this->Html->link($payCheckDeduction->income_deduction->name,
                            [
                                'controller' => 'IncomeDeductions',
                                'action' => 'view',
                                $payCheckDeduction->income_deduction->id
                            ]) : '' ?></td>
                    <td><?= $this->Number->format($payCheckDeduction->amount) ?></td>
                    <td><?= $this->Number->format($payCheckDeduction->position) ?></td>
                    <td><?= h($payCheckDeduction->created) ?></td>
                    <td><?= h($payCheckDeduction->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $payCheckDeduction->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $payCheckDeduction->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $payCheckDeduction->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $payCheckDeduction->id)]) ?>
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
