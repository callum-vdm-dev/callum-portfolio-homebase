<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<div class="container-fluid px-4">
    <h1 class="mt-4"><?= h($project->title) ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><?= $this->Html->link('Dashboard', ['controller' => 'Users', 'action' => 'dashboard']) ?></li>
        <li class="breadcrumb-item"><?= $this->Html->link('Projects', ['action' => 'index']) ?></li>
        <li class="breadcrumb-item active">View Project</li>
    </ol>

    <div class="mb-3 d-flex justify-content-end gap-2">
        <?= $this->Html->link(__('Edit Project'), ['action' => 'edit', $project->id], ['class' => 'btn btn-primary']) ?>
        <?= $this->Form->postLink(__('Delete Project'), ['action' => 'delete', $project->id], [
            'confirm' => __('Are you sure you want to delete # {0}?', $project->id),
            'class' => 'btn btn-danger'
        ]) ?>
        <?= $this->Html->link(__('New Project'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
    </div>

    <div class="card mb-4">
        <div class="card-header">Project Details</div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr><th>Title</th><td><?= h($project->title) ?></td></tr>
                <tr><th>Slug</th><td><?= h($project->slug) ?></td></tr>
                <tr><th>Status</th><td><span class="badge bg-secondary text-capitalize"><?= h($project->status) ?></span></td></tr>
                <tr><th>Github URL</th><td><?= h($project->github_url) ?></td></tr>
                <tr><th>Live URL</th><td><?= h($project->live_url) ?></td></tr>
                <tr><th>User</th>
                    <td><?= $project->user ? $this->Html->link($project->user->name, ['controller' => 'Users', 'action' => 'view', $project->user->id]) : '-' ?></td>
                </tr>
                <tr><th>Start Date</th><td><?= h($project->start_date) ?></td></tr>
                <tr><th>Created</th><td><?= h($project->created) ?></td></tr>
                <tr><th>Modified</th><td><?= h($project->modified) ?></td></tr>
            </table>

            <h5 class="mt-4">Project Overview</h5>
            <blockquote class="blockquote p-3 bg-light border rounded">
                <?= $project->overview ?>
            </blockquote>
        </div>
    </div>

    <?php if (!empty($project->posts)) : ?>
        <div class="card mb-4">
            <div class="card-header">Related Posts</div>
            <div class="card-body table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-light">
                    <tr>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>User</th>
                        <th>Created</th>
                        <th>Modified</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($project->posts as $post) : ?>
                        <tr>
                            <td><?= h($post->title) ?></td>
                            <td><?= h($post->slug) ?></td>
                            <td><span class="badge bg-secondary text-capitalize"><?= h($post->status) ?></span></td>
                            <td><?= $post->user ? $this->Html->link($post->user->name, ['controller' => 'Users', 'action' => 'view', $post->user->id]) : '-' ?></td>
                            <td><?= h($post->created) ?></td>
                            <td><?= h($post->modified) ?></td>
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

    <?php if (!empty($project->project_photos)) : ?>
        <div class="card mb-4">
            <div class="card-header">Related Project Photos</div>
            <div class="card-body table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-light">
                    <tr>
                        <th>Title</th>
                        <th>Caption</th>
                        <th>Path</th>
                        <th>Created</th>
                        <th>Project ID</th>
                        <th>Sort Order</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($project->project_photos as $photo) : ?>
                        <tr>
                            <td><?= h($photo->title) ?></td>
                            <td><?= h($photo->caption) ?></td>
                            <td><?= h($photo->path) ?></td>
                            <td><?= h($photo->created) ?></td>
                            <td><?= h($photo->project_id) ?></td>
                            <td><?= h($photo->sort_order) ?></td>
                            <td class="text-nowrap">
                                <?= $this->Html->link('View', ['controller' => 'ProjectPhotos', 'action' => 'view', $photo->id], ['class' => 'btn btn-sm btn-outline-primary']) ?>
                                <?= $this->Html->link('Edit', ['controller' => 'ProjectPhotos', 'action' => 'edit', $photo->id], ['class' => 'btn btn-sm btn-outline-secondary']) ?>
                                <?= $this->Form->postLink('Delete', ['controller' => 'ProjectPhotos', 'action' => 'delete', $photo->id], [
                                    'confirm' => __('Are you sure you want to delete # {0}?', $photo->id),
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
