<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CreditCard[]|\Cake\Collection\CollectionInterface $creditCards
 */
?>
<div class="creditCards index content">
    <?= $this->Html->link(__('New Credit Card'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Credit Cards') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('apr') ?></th>
                    <th><?= $this->Paginator->sort('limit') ?></th>
                    <th><?= $this->Paginator->sort('balance') ?></th>
                    <th><?= $this->Paginator->sort('usage') ?></th>
                    <th><?= $this->Paginator->sort('available') ?></th>
                    <th><?= $this->Paginator->sort('due_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($creditCards as $creditCard): ?>
                <tr>
                    <td><?= h($creditCard->name) ?></td>
                    <td><?= $this->Number->toPercentage($creditCard->apr) ?></td>
                    <td><?= $this->Number->currency($creditCard->limit) ?></td>
                    <td><?= $this->Number->currency($creditCard->balance) ?></td>
                    <td><?= $this->Number->toPercentage($creditCard->usage) ?></td>
                    <td><?= $this->Number->currency($creditCard->available) ?></td>
                    <td><?= h($creditCard->due_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $creditCard->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $creditCard->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $creditCard->id], ['confirm' => __('Are you sure you want to delete # {0}?', $creditCard->id)]) ?>
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
