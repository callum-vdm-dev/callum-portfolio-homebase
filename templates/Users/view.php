<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="container-fluid px-4">
    <h1 class="mt-4"><?= h($user->name) ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><?= $this->Html->link('Dashboard', ['controller' => 'Users', 'action' => 'dashboard']) ?></li>
        <li class="breadcrumb-item"><?= $this->Html->link('Users', ['action' => 'index']) ?></li>
        <li class="breadcrumb-item active">View User</li>
    </ol>

    <div class="mb-3 d-flex justify-content-end gap-2">
        <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'btn btn-primary']) ?>
        <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], [
            'confirm' => __('Are you sure you want to delete # {0}?', $user->id),
            'class' => 'btn btn-danger'
        ]) ?>
        <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
    </div>

    <div class="card mb-4">
        <div class="card-header">User Details</div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr><th>Name</th><td><?= h($user->name) ?></td></tr>
                <tr><th>Email</th><td><?= h($user->email) ?></td></tr>
                <tr><th>Role</th><td><span class="badge bg-secondary text-capitalize"><?= h($user->role) ?></span></td></tr>
                <tr><th>Created</th><td><?= h($user->created) ?></td></tr>
                <tr><th>Modified</th><td><?= h($user->modified) ?></td></tr>
            </table>
        </div>
    </div>

    <?php if (!empty($user->posts)) : ?>
        <div class="card mb-4">
            <div class="card-header">Related Posts</div>
            <div class="card-body table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-light">
                    <tr>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Modified</th>
                        <th>Project</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($user->posts as $post) : ?>
                        <tr>
                            <td><?= h($post->title) ?></td>
                            <td><?= h($post->slug) ?></td>
                            <td><span class="badge bg-secondary text-capitalize"><?= h($post->status) ?></span></td>
                            <td><?= h($post->created) ?></td>
                            <td><?= h($post->modified) ?></td>
                            <td>
                                <?= $post->project ? $this->Html->link($post->project->title, ['controller' => 'Projects', 'action' => 'view', $post->project->id]) : '-' ?>
                            </td>
                            <td class="text-nowrap">
                                <?= $this->Html->link('View', ['controller' => 'Posts', 'action' => 'view', $post->id], ['class' => 'btn btn-sm btn-outline-primary']) ?>
                                <?= $this->Html->link('Edit', ['controller' => 'Posts', 'action' => 'edit', $post->id], ['class' => 'btn btn-sm btn-outline-secondary']) ?>
                                <?= $this->Form->postLink('Delete', ['controller' => 'Posts', 'action' => 'delete', $post->id], [
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
    <?php endif; ?>

    <?php if (!empty($user->projects)) : ?>
        <div class="card mb-4">
            <div class="card-header">Related Projects</div>
            <div class="card-body table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-light">
                    <tr>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Github URL</th>
                        <th>Live URL</th>
                        <th>Start Date</th>
                        <th>Created</th>
                        <th>Modified</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($user->projects as $project) : ?>
                        <tr>
                            <td><?= h($project->title) ?></td>
                            <td><?= h($project->slug) ?></td>
                            <td><span class="badge bg-secondary text-capitalize"><?= h($project->status) ?></span></td>
                            <td><?= h($project->github_url) ?></td>
                            <td><?= h($project->live_url) ?></td>
                            <td><?= h($project->start_date) ?></td>
                            <td><?= h($project->created) ?></td>
                            <td><?= h($project->modified) ?></td>
                            <td class="text-nowrap">
                                <?= $this->Html->link('View', ['controller' => 'Projects', 'action' => 'view', $project->id], ['class' => 'btn btn-sm btn-outline-primary']) ?>
                                <?= $this->Html->link('Edit', ['controller' => 'Projects', 'action' => 'edit', $project->id], ['class' => 'btn btn-sm btn-outline-secondary']) ?>
                                <?= $this->Form->postLink('Delete', ['controller' => 'Projects', 'action' => 'delete', $project->id], [
                                    'confirm' => __('Are you sure you want to delete # {0}?', $project->id),
                                    'class' => 'btn btn-sm btn-outline-danger'
                                ]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
</div>
