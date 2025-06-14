<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectPhoto $projectPhoto
 * @var \Cake\Collection\CollectionInterface|string[] $projects
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Project Photos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projectPhotos form content">
            <?= $this->Form->create($projectPhoto) ?>
            <fieldset>
                <legend><?= __('Add Project Photo') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('caption');
                    echo $this->Form->control('path');
                    echo $this->Form->control('project_id', ['options' => $projects]);
                    echo $this->Form->control('sort_order');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
