<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PayCheckBudget $payCheckBudget
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Pay Check Budget'), ['action' => 'edit', $payCheckBudget->id],
                ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pay Check Budget'), ['action' => 'delete', $payCheckBudget->id], [
                'confirm' => __('Are you sure you want to delete # {0}?', $payCheckBudget->id),
                'class' => 'side-nav-item'
            ]) ?>
            <?= $this->Html->link(__('List Pay Check Budgets'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pay Check Budget'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="payCheckBudgets view content">
            <h3><?= h($payCheckBudget->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Pay Check') ?></th>
                    <td><?= $payCheckBudget->has('pay_check') ? $this->Html->link($payCheckBudget->pay_check->name, [
                            'controller' => 'PayChecks',
                            'action' => 'view',
                            $payCheckBudget->pay_check->id
                        ]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Budget Item') ?></th>
                    <td><?= $payCheckBudget->has('budget_item') ? $this->Html->link($payCheckBudget->budget_item->name,
                            [
                                'controller' => 'BudgetItems',
                                'action' => 'view',
                                $payCheckBudget->budget_item->id
                            ]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($payCheckBudget->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $this->Number->format($payCheckBudget->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($payCheckBudget->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($payCheckBudget->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
