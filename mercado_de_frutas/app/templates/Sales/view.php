<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sale $sale
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Sale'), ['action' => 'edit', $sale->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sale'), ['action' => 'delete', $sale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sale->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sales'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sale'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="sales view content">
            <h3><?= h($sale->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $sale->hasValue('user') ? $this->Html->link($sale->user->username, ['controller' => 'Users', 'action' => 'view', $sale->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($sale->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total') ?></th>
                    <td><?= $this->Number->format($sale->total) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($sale->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($sale->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Sales Items') ?></h4>
                <?php if (!empty($sale->sales_items)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Sale Id') ?></th>
                            <th><?= __('Fruit Id') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Discount') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($sale->sales_items as $salesItem) : ?>
                        <tr>
                            <td><?= h($salesItem->id) ?></td>
                            <td><?= h($salesItem->sale_id) ?></td>
                            <td><?= h($salesItem->fruit_id) ?></td>
                            <td><?= h($salesItem->quantity) ?></td>
                            <td><?= h($salesItem->price) ?></td>
                            <td><?= h($salesItem->discount) ?></td>
                            <td><?= h($salesItem->created) ?></td>
                            <td><?= h($salesItem->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'SalesItems', 'action' => 'view', $salesItem->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'SalesItems', 'action' => 'edit', $salesItem->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'SalesItems', 'action' => 'delete', $salesItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $salesItem->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
