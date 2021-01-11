<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id],
                ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], [
                'confirm' => __('Are you sure you want to delete # {0}?', $category->id),
                'class' => 'side-nav-item'
            ]) ?>
            <?= $this->Html->link(__('List Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="categories view content">
            <h3><?= h($category->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($category->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Parent Category') ?></th>
                    <td><?= $category->has('parent_category') ? $this->Html->link($category->parent_category->name, [
                            'controller' => 'Categories',
                            'action' => 'view',
                            $category->parent_category->id
                        ]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($category->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lft') ?></th>
                    <td><?= $this->Number->format($category->lft) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rght') ?></th>
                    <td><?= $this->Number->format($category->rght) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($category->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($category->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Budget Items') ?></h4>
                <?php if (!empty($category->budget_items)) : ?>
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
                            <?php foreach ($category->budget_items as $budgetItems) : ?>
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
            <div class="related">
                <h4><?= __('Related Categories') ?></h4>
                <?php if (!empty($category->child_categories)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Name') ?></th>
                                <th><?= __('Lft') ?></th>
                                <th><?= __('Rght') ?></th>
                                <th><?= __('Parent Id') ?></th>
                                <th><?= __('Created') ?></th>
                                <th><?= __('Modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($category->child_categories as $childCategories) : ?>
                                <tr>
                                    <td><?= h($childCategories->id) ?></td>
                                    <td><?= h($childCategories->name) ?></td>
                                    <td><?= h($childCategories->lft) ?></td>
                                    <td><?= h($childCategories->rght) ?></td>
                                    <td><?= h($childCategories->parent_id) ?></td>
                                    <td><?= h($childCategories->created) ?></td>
                                    <td><?= h($childCategories->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'),
                                            ['controller' => 'Categories', 'action' => 'view', $childCategories->id]) ?>
                                        <?= $this->Html->link(__('Edit'),
                                            ['controller' => 'Categories', 'action' => 'edit', $childCategories->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'),
                                            ['controller' => 'Categories', 'action' => 'delete', $childCategories->id],
                                            [
                                                'confirm' => __('Are you sure you want to delete # {0}?',
                                                    $childCategories->id)
                                            ]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Income Deductions') ?></h4>
                <?php if (!empty($category->income_deductions)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Income Id') ?></th>
                                <th><?= __('Category Id') ?></th>
                                <th><?= __('Name') ?></th>
                                <th><?= __('Amount') ?></th>
                                <th><?= __('Created') ?></th>
                                <th><?= __('Modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($category->income_deductions as $incomeDeductions) : ?>
                                <tr>
                                    <td><?= h($incomeDeductions->id) ?></td>
                                    <td><?= h($incomeDeductions->income_id) ?></td>
                                    <td><?= h($incomeDeductions->category_id) ?></td>
                                    <td><?= h($incomeDeductions->name) ?></td>
                                    <td><?= h($incomeDeductions->amount) ?></td>
                                    <td><?= h($incomeDeductions->created) ?></td>
                                    <td><?= h($incomeDeductions->modified) ?></td>
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
