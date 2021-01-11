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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $payCheckBudget->id],
                [
                    'confirm' => __('Are you sure you want to delete # {0}?', $payCheckBudget->id),
                    'class' => 'side-nav-item'
                ]
            ) ?>
            <?= $this->Html->link(__('List Pay Check Budgets'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="payCheckBudgets form content">
            <?= $this->Form->create($payCheckBudget) ?>
            <fieldset>
                <legend><?= __('Edit Pay Check Budget') ?></legend>
                <?php
                echo $this->Form->control('pay_check_id', ['options' => $payChecks]);
                echo $this->Form->control('budget_item_id', ['options' => $budgetItems]);
                echo $this->Form->control('amount');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
