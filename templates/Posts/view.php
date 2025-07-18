<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<div class="container-fluid px-4">
    <h1 class="mt-4"><?= h($post->title) ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><?= $this->Html->link('Dashboard', ['controller' => 'Users', 'action' => 'dashboard']) ?></li>
        <li class="breadcrumb-item"><?= $this->Html->link('Posts', ['action' => 'index']) ?></li>
        <li class="breadcrumb-item active">View Post</li>
    </ol>

    <div class="mb-3 d-flex justify-content-end gap-2">
        <?= $this->Html->link(__('Edit Post'), ['action' => 'edit', $post->id], ['class' => 'btn btn-primary']) ?>
        <?= $this->Form->postLink(__('Delete Post'), ['action' => 'delete', $post->id], [
            'confirm' => __('Are you sure you want to delete # {0}?', $post->id),
            'class' => 'btn btn-danger'
        ]) ?>
        <?= $this->Html->link(__('New Post'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            Post Details
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Title</th>
                    <td><?= h($post->title) ?></td>
                </tr>
                <tr>
                    <th>Slug</th>
                    <td><?= h($post->slug) ?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td><span class="badge bg-secondary text-capitalize"><?= h($post->status) ?></span></td>
                </tr>
                <tr>
                    <th>Project</th>
                    <td><?= $post->project ? $this->Html->link($post->project->title, ['controller' => 'Projects', 'action' => 'view', $post->project->id]) : '-' ?></td>
                </tr>
                <tr>
                    <th>User</th>
                    <td><?= $post->user ? $this->Html->link($post->user->name, ['controller' => 'Users', 'action' => 'view', $post->user->id]) : '-' ?></td>
                </tr>
                <tr>
                    <th>Created</th>
                    <td><?= h($post->created) ?></td>
                </tr>
                <tr>
                    <th>Modified</th>
                    <td><?= h($post->modified) ?></td>
                </tr>
            </table>

            <h5 class="mt-4">Post Content</h5>
            <blockquote class="blockquote p-3 bg-light border rounded">
                <?= $post->text ?>
            </blockquote>
        </div>
    </div>
</div>
