<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PayCheckDeduction $payCheckDeduction
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Pay Check Deduction'), ['action' => 'edit', $payCheckDeduction->id],
                ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pay Check Deduction'), ['action' => 'delete', $payCheckDeduction->id],
                [
                    'confirm' => __('Are you sure you want to delete # {0}?', $payCheckDeduction->id),
                    'class' => 'side-nav-item'
                ]) ?>
            <?= $this->Html->link(__('List Pay Check Deductions'), ['action' => 'index'],
                ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pay Check Deduction'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="payCheckDeductions view content">
            <h3><?= h($payCheckDeduction->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Pay Check') ?></th>
                    <td><?= $payCheckDeduction->has('pay_check') ? $this->Html->link($payCheckDeduction->pay_check->name,
                            [
                                'controller' => 'PayChecks',
                                'action' => 'view',
                                $payCheckDeduction->pay_check->id
                            ]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Income Deduction') ?></th>
                    <td><?= $payCheckDeduction->has('income_deduction') ? $this->Html->link($payCheckDeduction->income_deduction->name,
                            [
                                'controller' => 'IncomeDeductions',
                                'action' => 'view',
                                $payCheckDeduction->income_deduction->id
                            ]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($payCheckDeduction->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $this->Number->format($payCheckDeduction->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Position') ?></th>
                    <td><?= $this->Number->format($payCheckDeduction->position) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($payCheckDeduction->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($payCheckDeduction->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
