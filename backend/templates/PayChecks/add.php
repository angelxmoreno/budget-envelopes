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
            <?= $this->Html->link(__('List Pay Checks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="payChecks form content">
            <?= $this->Form->create($payCheck) ?>
            <fieldset>
                <legend><?= __('Add Pay Check') ?></legend>
                <?php
                echo $this->Form->control('pay_check_date', ['empty' => true]);
                echo $this->Form->control('name');
                echo $this->Form->control('series');
                echo $this->Form->control('gross');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
