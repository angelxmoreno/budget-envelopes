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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $budgetItem->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $budgetItem->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Budget Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="budgetItems form content">
            <?= $this->Form->create($budgetItem) ?>
            <fieldset>
                <legend><?= __('Edit Budget Item') ?></legend>
                <?php
                echo $this->Form->control('category_id', ['options' => $categories]);
                echo $this->Form->control('budget_id', ['options' => $budgets]);
                echo $this->Form->control('name');
                echo $this->Form->control('amount');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
