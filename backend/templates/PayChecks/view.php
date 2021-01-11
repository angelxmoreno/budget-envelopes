<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PayCheck $payCheck
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Pay Check'), ['action' => 'edit', $payCheck->id],
                ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pay Check'), ['action' => 'delete', $payCheck->id], [
                'confirm' => __('Are you sure you want to delete # {0}?', $payCheck->id),
                'class' => 'side-nav-item'
            ]) ?>
            <?= $this->Html->link(__('List Pay Checks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pay Check'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="payChecks view content">
            <h3><?= h($payCheck->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($payCheck->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($payCheck->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Series') ?></th>
                    <td><?= $this->Number->format($payCheck->series) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gross') ?></th>
                    <td><?= $this->Number->format($payCheck->gross) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pay Check Date') ?></th>
                    <td><?= h($payCheck->pay_check_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($payCheck->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($payCheck->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Pay Check Budgets') ?></h4>
                <?php if (!empty($payCheck->pay_check_budgets)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Pay Check Id') ?></th>
                                <th><?= __('Budget Item Id') ?></th>
                                <th><?= __('Amount') ?></th>
                                <th><?= __('Created') ?></th>
                                <th><?= __('Modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($payCheck->pay_check_budgets as $payCheckBudgets) : ?>
                                <tr>
                                    <td><?= h($payCheckBudgets->id) ?></td>
                                    <td><?= h($payCheckBudgets->pay_check_id) ?></td>
                                    <td><?= h($payCheckBudgets->budget_item_id) ?></td>
                                    <td><?= h($payCheckBudgets->amount) ?></td>
                                    <td><?= h($payCheckBudgets->created) ?></td>
                                    <td><?= h($payCheckBudgets->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), [
                                            'controller' => 'PayCheckBudgets',
                                            'action' => 'view',
                                            $payCheckBudgets->id
                                        ]) ?>
                                        <?= $this->Html->link(__('Edit'), [
                                            'controller' => 'PayCheckBudgets',
                                            'action' => 'edit',
                                            $payCheckBudgets->id
                                        ]) ?>
                                        <?= $this->Form->postLink(__('Delete'), [
                                            'controller' => 'PayCheckBudgets',
                                            'action' => 'delete',
                                            $payCheckBudgets->id
                                        ], [
                                            'confirm' => __('Are you sure you want to delete # {0}?',
                                                $payCheckBudgets->id)
                                        ]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Pay Check Deductions') ?></h4>
                <?php if (!empty($payCheck->pay_check_deductions)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Pay Check Id') ?></th>
                                <th><?= __('Income Deduction Id') ?></th>
                                <th><?= __('Amount') ?></th>
                                <th><?= __('Position') ?></th>
                                <th><?= __('Created') ?></th>
                                <th><?= __('Modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($payCheck->pay_check_deductions as $payCheckDeductions) : ?>
                                <tr>
                                    <td><?= h($payCheckDeductions->id) ?></td>
                                    <td><?= h($payCheckDeductions->pay_check_id) ?></td>
                                    <td><?= h($payCheckDeductions->income_deduction_id) ?></td>
                                    <td><?= h($payCheckDeductions->amount) ?></td>
                                    <td><?= h($payCheckDeductions->position) ?></td>
                                    <td><?= h($payCheckDeductions->created) ?></td>
                                    <td><?= h($payCheckDeductions->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), [
                                            'controller' => 'PayCheckDeductions',
                                            'action' => 'view',
                                            $payCheckDeductions->id
                                        ]) ?>
                                        <?= $this->Html->link(__('Edit'), [
                                            'controller' => 'PayCheckDeductions',
                                            'action' => 'edit',
                                            $payCheckDeductions->id
                                        ]) ?>
                                        <?= $this->Form->postLink(__('Delete'), [
                                            'controller' => 'PayCheckDeductions',
                                            'action' => 'delete',
                                            $payCheckDeductions->id
                                        ], [
                                            'confirm' => __('Are you sure you want to delete # {0}?',
                                                $payCheckDeductions->id)
                                        ]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
