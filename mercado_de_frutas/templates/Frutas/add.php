<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fruta $fruta
 * @var \Cake\Collection\CollectionInterface|string[] $administradores
 * @var \Cake\Collection\CollectionInterface|string[] $classificacoes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Frutas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="frutas form content">
            <?= $this->Form->create($fruta) ?>
            <fieldset>
                <legend><?= __('Add Fruta') ?></legend>
                <?php
                    echo $this->Form->control('nome_fruta');
                    echo $this->Form->control('quantidade_disponivel');
                    echo $this->Form->control('fresca');
                    echo $this->Form->control('valor_fruta');
                    echo $this->Form->control('administrador_id', ['options' => $administradores]);
                    echo $this->Form->control('classificacao_id', ['options' => $classificacoes]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
