<?php
declare(strict_types=1);
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bill[]|\Cake\Collection\CollectionInterface $bills
 * @var \App\Model\Entity\Bill $totals
 */
?>
<div class="bills index content">
    <?= $this->Html->link(__('New Bill'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Bills') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('amount') ?></th>
                <th><?= $this->Paginator->sort('frequency') ?></th>
                <th><?= $this->Paginator->sort('due_date') ?></th>
                <th><?= $this->Paginator->sort('is_auto_paid') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($bills as $bill): ?>
                <tr>
                    <td>
                        <?= $bill->has('img_url') ? $this->Html->image($bill->img_url,[
                            'width' => 75
                        ]): ''?>
                        <h4><?= h($bill->name) ?></h4>
                    </td>
                    <td><?= $this->Number->currency($bill->amount) ?></td>
                    <td><?= h($bill->frequency) ?></td>
                    <td><?= h($bill->due_date) ?></td>
                    <td><?= $bill->is_auto_paid ? __('Yes') : __('No'); ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $bill->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bill->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bill->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $bill->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td>
                    Totals
                </td>
                <td><?= $this->Number->currency($totals->amount) ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="actions"></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
