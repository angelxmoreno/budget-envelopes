<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CreditCard $creditCard
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $creditCard->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $creditCard->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Credit Cards'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="creditCards form content">
            <?= $this->Form->create($creditCard) ?>
            <fieldset>
                <legend><?= __('Edit Credit Card') ?></legend>
                <?php
                echo $this->Form->control('issuer');
                echo $this->Form->control('name');
                echo $this->Form->control('url');
                echo $this->Form->control('img_url');
                echo $this->Form->control('apr');
                echo $this->Form->control('limit');
                echo $this->Form->control('balance');
                echo $this->Form->control('due_date');
                echo $this->Form->control('is_auto_paid');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
