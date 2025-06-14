<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectPhoto $projectPhoto
 * @var string[]|\Cake\Collection\CollectionInterface $projects
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $projectPhoto->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $projectPhoto->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Project Photos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projectPhotos form content">
            <?= $this->Form->create($projectPhoto) ?>
            <fieldset>
                <legend><?= __('Edit Project Photo') ?></legend>
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
