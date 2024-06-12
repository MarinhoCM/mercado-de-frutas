<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SalesItem $salesItem
 * @var \Cake\Collection\CollectionInterface|string[] $sales
 * @var \Cake\Collection\CollectionInterface|string[] $fruits
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Sales Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="salesItems form content">
            <?= $this->Form->create($salesItem) ?>
            <fieldset>
                <legend><?= __('Add Sales Item') ?></legend>
                <?php
                    echo $this->Form->control('sale_id', ['options' => $sales]);
                    echo $this->Form->control('fruit_id', ['options' => $fruits]);
                    echo $this->Form->control('quantity');
                    echo $this->Form->control('price');
                    echo $this->Form->control('discount');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
