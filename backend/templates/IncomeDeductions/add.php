<?php
declare(strict_types=1);
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IncomeDeduction $incomeDeduction
 * @var \App\Model\Entity\Income[] $incomes
 * @var \App\Model\Entity\Category[] $categories
 */

$params = $this->getRequest()->getParam('pass');
$income_id = reset($params);

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Income Deductions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="incomeDeductions form content">
            <?= $this->Form->create($incomeDeduction) ?>
            <fieldset>
                <legend><?= __('Add Income Deduction') ?></legend>
                <?php
                if (!$income_id) {
                    echo $this->Form->control('income_id', ['options' => $incomes]);
                }
                echo $this->Form->control('category_id', ['options' => $categories, 'empty' => true]);
                echo $this->Form->control('name');
                echo $this->Form->control('amount');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
