<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectPhoto $projectPhoto
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Project Photo'), ['action' => 'edit', $projectPhoto->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Project Photo'), ['action' => 'delete', $projectPhoto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectPhoto->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Project Photos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Project Photo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projectPhotos view content">
            <h3><?= h($projectPhoto->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($projectPhoto->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Path') ?></th>
                    <td><?= h($projectPhoto->path) ?></td>
                </tr>
                <tr>
                    <th><?= __('Project') ?></th>
                    <td><?= $projectPhoto->hasValue('project') ? $this->Html->link($projectPhoto->project->title, ['controller' => 'Projects', 'action' => 'view', $projectPhoto->project->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($projectPhoto->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sort Order') ?></th>
                    <td><?= $this->Number->format($projectPhoto->sort_order) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($projectPhoto->created) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Caption') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($projectPhoto->caption)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>