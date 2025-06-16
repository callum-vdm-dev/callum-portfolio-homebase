<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Post> $posts
 */
?>
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
        <h1 class="h3"><?= __('Posts') ?></h1>
        <?= $this->Html->link(__('New Post'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
    </div>

    <div class="card mb-4">
        <div class="card-body table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-light">
                <tr>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('slug') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('project_id', 'Project') ?></th>
                    <th><?= $this->Paginator->sort('user_id', 'User') ?></th>
                    <th class="text-center"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($posts as $post): ?>
                    <tr>
                        <td><?= h($post->title) ?></td>
                        <td><?= h($post->slug) ?></td>
                        <td><?= h($post->created) ?></td>
                        <td><?= h($post->modified) ?></td>
                        <td><span class="badge bg-secondary text-capitalize"><?= h($post->status) ?></span></td>
                        <td>
                            <?= $post->hasValue('project') ? $this->Html->link($post->project->title, ['controller' => 'Projects', 'action' => 'view', $post->project->id]) : '-' ?>
                        </td>
                        <td>
                            <?= $post->hasValue('user') ? $this->Html->link($post->user->name, ['controller' => 'Users', 'action' => 'view', $post->user->id]) : '-' ?>
                        </td>
                        <td class="text-nowrap text-center">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $post->id], ['class' => 'btn btn-sm btn-outline-primary me-1']) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $post->id], ['class' => 'btn btn-sm btn-outline-secondary me-1']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $post->id], [
                                'confirm' => __('Are you sure you want to delete # {0}?', $post->id),
                                'class' => 'btn btn-sm btn-outline-danger'
                            ]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center">
        <div>
            <ul class="pagination mb-0">
                <?= $this->Paginator->first('<<') ?>
                <?= $this->Paginator->prev('<') ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next('>') ?>
                <?= $this->Paginator->last('>>') ?>
            </ul>
        </div>
        <div>
            <p class="text-muted mb-0">
                <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} of {{count}} total')) ?>
            </p>
        </div>
    </div>
</div>
