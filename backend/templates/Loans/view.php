<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Loan $loan
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Loan'), ['action' => 'edit', $loan->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Loan'), ['action' => 'delete', $loan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loan->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Loans'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Loan'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="loans view content">
            <h3><?= h($loan->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Issuer') ?></th>
                    <td><?= h($loan->issuer) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($loan->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($loan->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Apr') ?></th>
                    <td><?= $this->Number->format($loan->apr) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $this->Number->format($loan->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Terms') ?></th>
                    <td><?= $this->Number->format($loan->terms) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Issued') ?></th>
                    <td><?= h($loan->date_issued) ?></td>
                </tr>
                <tr>
                    <th><?= __('Due Date') ?></th>
                    <td><?= h($loan->due_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($loan->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($loan->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Auto Paid') ?></th>
                    <td><?= $loan->is_auto_paid ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Url') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($loan->url)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Img Url') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($loan->img_url)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
