<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fruit $fruit
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Fruits'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="fruits form content">
            <?= $this->Form->create($fruit) ?>
            <fieldset>
                <legend><?= __('Add Fruit') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('classification');
                    echo $this->Form->control('is_fresh');
                    echo $this->Form->control('quantity_available');
                    echo $this->Form->control('price');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
