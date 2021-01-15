<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Loan $loan
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Loans'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="loans form content">
            <?= $this->Form->create($loan) ?>
            <fieldset>
                <legend><?= __('Add Loan') ?></legend>
                <?php
                echo $this->Form->control('issuer');
                echo $this->Form->control('name');
                echo $this->Form->control('url');
                echo $this->Form->control('img_url');
                echo $this->Form->control('apr');
                echo $this->Form->control('amount');
                echo $this->Form->control('date_issued');
                echo $this->Form->control('terms');
                echo $this->Form->control('due_date');
                echo $this->Form->control('is_auto_paid');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
