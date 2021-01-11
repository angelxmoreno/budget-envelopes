<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BudgetItem $budgetItem
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Budget Item'), ['action' => 'edit', $budgetItem->id],
                ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Budget Item'), ['action' => 'delete', $budgetItem->id], [
                'confirm' => __('Are you sure you want to delete # {0}?', $budgetItem->id),
                'class' => 'side-nav-item'
            ]) ?>
            <?= $this->Html->link(__('List Budget Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Budget Item'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="budgetItems view content">
            <h3><?= h($budgetItem->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Category') ?></th>
                    <td><?= $budgetItem->has('category') ? $this->Html->link($budgetItem->category->name,
                            ['controller' => 'Categories', 'action' => 'view', $budgetItem->category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Budget') ?></th>
                    <td><?= $budgetItem->has('budget') ? $this->Html->link($budgetItem->budget->id,
                            ['controller' => 'Budgets', 'action' => 'view', $budgetItem->budget->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($budgetItem->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($budgetItem->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $this->Number->format($budgetItem->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($budgetItem->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($budgetItem->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Pay Check Budgets') ?></h4>
                <?php if (!empty($budgetItem->pay_check_budgets)) : ?>
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
                            <?php foreach ($budgetItem->pay_check_budgets as $payCheckBudgets) : ?>
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
        </div>
    </div>
</div>
