<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SalesItem $salesItem
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Sales Item'), ['action' => 'edit', $salesItem->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sales Item'), ['action' => 'delete', $salesItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $salesItem->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sales Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sales Item'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="salesItems view content">
            <h3><?= h($salesItem->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Sale') ?></th>
                    <td><?= $salesItem->hasValue('sale') ? $this->Html->link($salesItem->sale->id, ['controller' => 'Sales', 'action' => 'view', $salesItem->sale->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Fruit') ?></th>
                    <td><?= $salesItem->hasValue('fruit') ? $this->Html->link($salesItem->fruit->name, ['controller' => 'Fruits', 'action' => 'view', $salesItem->fruit->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($salesItem->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $this->Number->format($salesItem->quantity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($salesItem->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Discount') ?></th>
                    <td><?= $salesItem->discount === null ? '' : $this->Number->format($salesItem->discount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($salesItem->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($salesItem->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
