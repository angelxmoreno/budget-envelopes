<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CreditCard $creditCard
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Credit Card'), ['action' => 'edit', $creditCard->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Credit Card'), ['action' => 'delete', $creditCard->id], ['confirm' => __('Are you sure you want to delete # {0}?', $creditCard->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Credit Cards'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Credit Card'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="creditCards view content">
            <h3><?= h($creditCard->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Issuer') ?></th>
                    <td><?= h($creditCard->issuer) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($creditCard->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($creditCard->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Apr') ?></th>
                    <td><?= $this->Number->format($creditCard->apr) ?></td>
                </tr>
                <tr>
                    <th><?= __('Limit') ?></th>
                    <td><?= $this->Number->format($creditCard->limit) ?></td>
                </tr>
                <tr>
                    <th><?= __('Balance') ?></th>
                    <td><?= $this->Number->format($creditCard->balance) ?></td>
                </tr>
                <tr>
                    <th><?= __('Due Date') ?></th>
                    <td><?= h($creditCard->due_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($creditCard->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($creditCard->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Url') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($creditCard->url)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Img Url') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($creditCard->img_url)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
