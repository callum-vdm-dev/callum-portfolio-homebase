<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Project> $projects
 */
?>
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
        <h1 class="h3"><?= __('Projects') ?></h1>
        <?= $this->Html->link(__('New Project'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
    </div>

    <div class="card mb-4">
        <div class="card-body table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-light">
                <tr>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('slug') ?></th>
                    <th><?= $this->Paginator->sort('github_url') ?></th>
                    <th><?= $this->Paginator->sort('live_url') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('start_date') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('user_id', 'User') ?></th>
                    <th class="text-center"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($projects as $project): ?>
                    <tr>
                        <td><?= h($project->title) ?></td>
                        <td><?= h($project->slug) ?></td>
                        <td>
                            <?= $project->github_url ? $this->Html->link('GitHub', $project->github_url, ['target' => '_blank']) : '-' ?>
                        </td>
                        <td>
                            <?= $project->live_url ? $this->Html->link('Live Site', $project->live_url, ['target' => '_blank']) : '-' ?>
                        </td>
                        <td><span class="badge bg-secondary text-capitalize"><?= h($project->status) ?></span></td>
                        <td><?= h($project->start_date) ?></td>
                        <td><?= h($project->created) ?></td>
                        <td><?= h($project->modified) ?></td>
                        <td>
                            <?= $project->hasValue('user') ? $this->Html->link($project->user->name, ['controller' => 'Users', 'action' => 'view', $project->user->id]) : '-' ?>
                        </td>
                        <td class="text-nowrap text-center">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $project->id], ['class' => 'btn btn-sm btn-outline-primary me-1']) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $project->id], ['class' => 'btn btn-sm btn-outline-secondary me-1']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $project->id], [
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
