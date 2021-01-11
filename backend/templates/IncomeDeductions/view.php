<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IncomeDeduction $incomeDeduction
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Income Deduction'), ['action' => 'edit', $incomeDeduction->id],
                ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Income Deduction'), ['action' => 'delete', $incomeDeduction->id], [
                'confirm' => __('Are you sure you want to delete # {0}?', $incomeDeduction->id),
                'class' => 'side-nav-item'
            ]) ?>
            <?= $this->Html->link(__('List Income Deductions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Income Deduction'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="incomeDeductions view content">
            <h3><?= h($incomeDeduction->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Income') ?></th>
                    <td><?= $incomeDeduction->has('income') ? $this->Html->link($incomeDeduction->income->name,
                            ['controller' => 'Incomes', 'action' => 'view', $incomeDeduction->income->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Category') ?></th>
                    <td><?= $incomeDeduction->has('category') ? $this->Html->link($incomeDeduction->category->name, [
                            'controller' => 'Categories',
                            'action' => 'view',
                            $incomeDeduction->category->id
                        ]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $this->Number->format($incomeDeduction->amount) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Pay Check Deductions') ?></h4>
                <?php if (!empty($incomeDeduction->pay_check_deductions)) : ?>
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
                            <?php foreach ($incomeDeduction->pay_check_deductions as $payCheckDeductions) : ?>
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
