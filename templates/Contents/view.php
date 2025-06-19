<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Content $content
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Content'), ['action' => 'edit', $content->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Content'), ['action' => 'delete', $content->id], ['confirm' => __('Are you sure you want to delete # {0}?', $content->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Contents'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Content'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="contents view content">
            <h3><?= h($content->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($content->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($content->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($content->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($content->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Content') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($content->content)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>