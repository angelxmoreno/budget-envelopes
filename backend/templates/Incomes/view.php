<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Income $income
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Income'), ['action' => 'edit', $income->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Income Deduction'),
                ['controller' => 'IncomeDeductions', 'action' => 'add', $income->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Categories'), ['controller' => 'Categories', 'action' => 'index'],
                ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="incomes view content">
            <h3><?= h($income->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Pay Frequency') ?></th>
                    <td><?= h($income->frequency) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gross') ?></th>
                    <td><?= $this->Number->format($income->gross) ?></td>
                </tr>

                <tr>
                    <th><?= __('Total Deductions') ?></th>
                    <td><?= $this->Number->format($income->total_deductions) ?></td>
                </tr>

                <tr>
                    <th><?= __('Net') ?></th>
                    <td><?= $this->Number->format($income->net) ?></td>
                </tr>
                <tr>
                    <th><?= __('First Pay Check Date') ?></th>
                    <td><?= h($income->first_pay_check_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Income Deductions') ?></h4>
                <?php if (!empty($income->income_deductions)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Category') ?></th>
                                <th><?= __('Name') ?></th>
                                <th><?= __('Amount') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($income->income_deductions as $incomeDeductions) : ?>
                                <tr>
                                    <td><?= $incomeDeductions->category && $incomeDeductions->category->name ? h($incomeDeductions->category->name) : 'none' ?></td>
                                    <td><?= h($incomeDeductions->name) ?></td>
                                    <td><?= h($incomeDeductions->amount) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), [
                                            'controller' => 'IncomeDeductions',
                                            'action' => 'view',
                                            $incomeDeductions->id
                                        ]) ?>
                                        <?= $this->Html->link(__('Edit'), [
                                            'controller' => 'IncomeDeductions',
                                            'action' => 'edit',
                                            $incomeDeductions->id
                                        ]) ?>
                                        <?= $this->Form->postLink(__('Delete'), [
                                            'controller' => 'IncomeDeductions',
                                            'action' => 'delete',
                                            $incomeDeductions->id
                                        ], [
                                            'confirm' => __('Are you sure you want to delete # {0}?',
                                                $incomeDeductions->id)
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
