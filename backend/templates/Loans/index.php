<?php
declare(strict_types=1);
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Loan[]|\Cake\Collection\CollectionInterface $loans
 * @var \App\Model\Entity\Loan $totals
 */
?>
<div class="loans index content">
    <?= $this->Html->link(__('New Loan'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Loans') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('apr') ?></th>
                    <th><?= $this->Paginator->sort('amount') ?></th>
                    <th><?= $this->Paginator->sort('date_issued') ?></th>
                    <th><?= $this->Paginator->sort('terms') ?></th>
                    <th><?= $this->Paginator->sort('due_date') ?></th>
                    <th><?= $this->Paginator->sort('is_auto_paid') ?></th>
                    <th><?= $this->Paginator->sort('monthly_payment') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($loans as $loan): ?>
                <tr>
                    <td>
                        <?= $loan->has('img_url') ? $this->Html->image($loan->img_url,[
                            'width' => 75
                        ]): ''?>
                        <h4><?= h($loan->name) ?></h4>
                        <h6><?= h($loan->issuer) ?></h6>
                    </td>
                    <td><?= $this->Number->toPercentage($loan->apr) ?></td>
                    <td><?= $this->Number->currency($loan->amount) ?></td>
                    <td><?= h($loan->date_issued) ?></td>
                    <td><?= $this->Number->format($loan->terms) ?></td>
                    <td><?= h($loan->due_date) ?></td>
                    <td><?= $loan->is_auto_paid ? __('Yes') : __('No'); ?></td>
                    <td><?= $this->Number->currency($loan->monthly_payment) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $loan->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $loan->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $loan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loan->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td>
                        Totals
                    </td>
                    <td><?= $this->Number->format($totals->apr) ?>%</td>
                    <td><?= $this->Number->currency($totals->amount) ?></td>
                    <td><?= h($totals->date_issued) ?></td>
                    <td><?= $this->Number->format($totals->terms) ?></td>
                    <td></td>
                    <td></td>
                    <td><?= $this->Number->currency($loans->sumOf('monthly_payment')) ?></td>
                    <td class="actions"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
