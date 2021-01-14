<?php
declare(strict_types=1);
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CreditCard[]|\Cake\Collection\CollectionInterface $creditCards
 * @var \App\Model\Entity\CreditCard $totals
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
                <th><?= $this->Paginator->sort('is_auto_paid') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($creditCards as $creditCard): ?>
                <tr>
                    <td>
                        <?= $creditCard->has('img_url') ? $this->Html->image($creditCard->img_url, [
                            'width' => 150
                        ]) : '' ?>
                        <h4><?= h($creditCard->name) ?></h4>
                    </td>
                    <td><?= $this->Number->toPercentage($creditCard->apr) ?></td>
                    <td><?= $this->Number->currency($creditCard->limit) ?></td>
                    <td><?= $this->Number->currency($creditCard->balance) ?></td>
                    <td><?= $this->Number->toPercentage($creditCard->usage) ?></td>
                    <td><?= $this->Number->currency($creditCard->available) ?></td>
                    <td><?= h($creditCard->due_date) ?></td>
                    <td><?= $creditCard->is_auto_paid ? __('Yes') : __('No'); ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $creditCard->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $creditCard->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $creditCard->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $creditCard->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td>
                    Totals
                </td>
                <td><?= $this->Number->toPercentage($totals->apr) ?></td>
                <td><?= $this->Number->currency($totals->limit) ?></td>
                <td><?= $this->Number->currency($totals->balance) ?></td>
                <td><?= $this->Number->toPercentage($totals->usage) ?></td>
                <td><?= $this->Number->currency($totals->available) ?></td>
                <td></td>
                <td></td>
                <td class="actions"></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
