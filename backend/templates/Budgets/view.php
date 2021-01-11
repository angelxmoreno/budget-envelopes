<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Budget $budget
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Budget'), ['action' => 'edit', $budget->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Budget'), ['action' => 'delete', $budget->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $budget->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Budgets'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Budget'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="budgets view content">
            <h3><?= h($budget->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($budget->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total') ?></th>
                    <td><?= $this->Number->format($budget->total) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($budget->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($budget->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Budget Items') ?></h4>
                <?php if (!empty($budget->budget_items)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Category Id') ?></th>
                                <th><?= __('Budget Id') ?></th>
                                <th><?= __('Name') ?></th>
                                <th><?= __('Amount') ?></th>
                                <th><?= __('Created') ?></th>
                                <th><?= __('Modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($budget->budget_items as $budgetItems) : ?>
                                <tr>
                                    <td><?= h($budgetItems->id) ?></td>
                                    <td><?= h($budgetItems->category_id) ?></td>
                                    <td><?= h($budgetItems->budget_id) ?></td>
                                    <td><?= h($budgetItems->name) ?></td>
                                    <td><?= h($budgetItems->amount) ?></td>
                                    <td><?= h($budgetItems->created) ?></td>
                                    <td><?= h($budgetItems->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'),
                                            ['controller' => 'BudgetItems', 'action' => 'view', $budgetItems->id]) ?>
                                        <?= $this->Html->link(__('Edit'),
                                            ['controller' => 'BudgetItems', 'action' => 'edit', $budgetItems->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'),
                                            ['controller' => 'BudgetItems', 'action' => 'delete', $budgetItems->id], [
                                                'confirm' => __('Are you sure you want to delete # {0}?',
                                                    $budgetItems->id)
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
