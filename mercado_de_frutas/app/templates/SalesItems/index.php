<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\SalesItem> $salesItems
 */
?>
<div class="salesItems index content">
    <?= $this->Html->link(__('New Sales Item'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Sales Items') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('sale_id') ?></th>
                    <th><?= $this->Paginator->sort('fruit_id') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th><?= $this->Paginator->sort('discount') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($salesItems as $salesItem): ?>
                <tr>
                    <td><?= $this->Number->format($salesItem->id) ?></td>
                    <td><?= $salesItem->hasValue('sale') ? $this->Html->link($salesItem->sale->id, ['controller' => 'Sales', 'action' => 'view', $salesItem->sale->id]) : '' ?></td>
                    <td><?= $salesItem->hasValue('fruit') ? $this->Html->link($salesItem->fruit->name, ['controller' => 'Fruits', 'action' => 'view', $salesItem->fruit->id]) : '' ?></td>
                    <td><?= $this->Number->format($salesItem->quantity) ?></td>
                    <td><?= $this->Number->format($salesItem->price) ?></td>
                    <td><?= $salesItem->discount === null ? '' : $this->Number->format($salesItem->discount) ?></td>
                    <td><?= h($salesItem->created) ?></td>
                    <td><?= h($salesItem->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $salesItem->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $salesItem->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $salesItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $salesItem->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
