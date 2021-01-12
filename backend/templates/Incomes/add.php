<?php
declare(strict_types=1);

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Income $income
 */

use App\Model\Enums\Frequency;

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Incomes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="incomes form content">
            <?= $this->Form->create($income) ?>
            <fieldset>
                <legend><?= __('Add Income') ?></legend>
                <?php
                echo $this->Form->control('name');
                echo $this->Form->control('frequency', [
                    'empty' => 'Choose',
                    'options' => Frequency::asList()
                ]);
                echo $this->Form->control('gross');
                echo $this->Form->control('first_pay_check_date', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
