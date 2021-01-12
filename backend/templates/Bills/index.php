<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bill[]|\Cake\Collection\CollectionInterface $bills
 */
?>
<div class="bills index content">
    <?= $this->Html->link(__('New Bill'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Bills') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('category_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('amount') ?></th>
                <th><?= $this->Paginator->sort('frequency') ?></th>
                <th><?= $this->Paginator->sort('is_auto_paid') ?></th>
                <th><?= $this->Paginator->sort('due_date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($bills as $bill): ?>
                <tr>
                    <td><?= $this->Number->format($bill->id) ?></td>
                    <td><?= $bill->has('category') ? $this->Html->link($bill->category->name,
                            ['controller' => 'Categories', 'action' => 'view', $bill->category->id]) : '' ?></td>
                    <td>
                        <h3><?= h($bill->name) ?></h3>
                        <?= $bill->has('img_url') ? $this->Html->image($bill->img_url,[
                            'width' => 45
                        ]): ''?>
                    </td>
                    <td><?= $this->Number->format($bill->amount) ?></td>
                    <td><?= h($bill->frequency) ?></td>
                    <td><?= $bill->is_auto_paid ? __('Yes') : __('No'); ?></td>
                    <td><?= h($bill->due_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $bill->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bill->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bill->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $bill->id)]) ?>
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
