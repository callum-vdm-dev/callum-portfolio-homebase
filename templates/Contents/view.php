<?php
/**
 * @var \App\View\AppView       $this
 * @var \App\Model\Entity\Content $content
 */
?>
<div class="container-fluid px-4">
    <h1 class="mt-4"><?= h($content->title) ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <?= $this->Html->link('Dashboard', ['controller' => 'Users', 'action' => 'dashboard']) ?>
        </li>
        <li class="breadcrumb-item">
            <?= $this->Html->link('Content Blocks', ['controller' => 'Contents', 'action' => 'index']) ?>
        </li>
        <li class="breadcrumb-item active"><?= __('View Content') ?></li>
    </ol>

    <div class="mb-3 d-flex justify-content-end gap-2">
        <?= $this->Html->link(__('Edit Content'), ['action' => 'edit', $content->id], ['class' => 'btn btn-primary']) ?>
        <?= $this->Form->postLink(__('Delete Content'), ['action' => 'delete', $content->id], [
            'confirm' => __('Are you sure you want to delete # {0}?', $content->id),
            'class'   => 'btn btn-danger'
        ]) ?>
        <?= $this->Html->link(__('New Content'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <?= __('Content Details') ?>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($content->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($content->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= $this->Number->format($content->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($content->modified) ?></td>
                </tr>
            </table>

            <h5 class="mt-4"><?= __('Content') ?></h5>
            <blockquote class="blockquote p-3 bg-light border rounded">
                <?= $content->content ?>
            </blockquote>
        </div>
    </div>
</div>
