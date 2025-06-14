<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PostPhoto $postPhoto
 * @var string[]|\Cake\Collection\CollectionInterface $posts
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $postPhoto->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $postPhoto->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Post Photos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="postPhotos form content">
            <?= $this->Form->create($postPhoto) ?>
            <fieldset>
                <legend><?= __('Edit Post Photo') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('caption');
                    echo $this->Form->control('path');
                    echo $this->Form->control('post_id', ['options' => $posts]);
                    echo $this->Form->control('sort_order');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
