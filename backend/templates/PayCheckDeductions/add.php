<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PayCheckDeduction $payCheckDeduction
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Pay Check Deductions'), ['action' => 'index'],
                ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="payCheckDeductions form content">
            <?= $this->Form->create($payCheckDeduction) ?>
            <fieldset>
                <legend><?= __('Add Pay Check Deduction') ?></legend>
                <?php
                echo $this->Form->control('pay_check_id', ['options' => $payChecks]);
                echo $this->Form->control('income_deduction_id', ['options' => $incomeDeductions]);
                echo $this->Form->control('amount');
                echo $this->Form->control('position');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
