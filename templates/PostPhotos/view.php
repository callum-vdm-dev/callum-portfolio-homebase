<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PostPhoto $postPhoto
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Post Photo'), ['action' => 'edit', $postPhoto->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Post Photo'), ['action' => 'delete', $postPhoto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $postPhoto->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Post Photos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Post Photo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="postPhotos view content">
            <h3><?= h($postPhoto->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($postPhoto->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Path') ?></th>
                    <td><?= h($postPhoto->path) ?></td>
                </tr>
                <tr>
                    <th><?= __('Post') ?></th>
                    <td><?= $postPhoto->hasValue('post') ? $this->Html->link($postPhoto->post->title, ['controller' => 'Posts', 'action' => 'view', $postPhoto->post->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($postPhoto->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sort Order') ?></th>
                    <td><?= $this->Number->format($postPhoto->sort_order) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($postPhoto->created) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Caption') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($postPhoto->caption)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>