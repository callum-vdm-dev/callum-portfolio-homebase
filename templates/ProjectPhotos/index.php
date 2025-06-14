<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ProjectPhoto> $projectPhotos
 */
?>
<div class="projectPhotos index content">
    <?= $this->Html->link(__('New Project Photo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Project Photos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('path') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('project_id') ?></th>
                    <th><?= $this->Paginator->sort('sort_order') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projectPhotos as $projectPhoto): ?>
                <tr>
                    <td><?= $this->Number->format($projectPhoto->id) ?></td>
                    <td><?= h($projectPhoto->title) ?></td>
                    <td><?= h($projectPhoto->path) ?></td>
                    <td><?= h($projectPhoto->created) ?></td>
                    <td><?= $projectPhoto->hasValue('project') ? $this->Html->link($projectPhoto->project->title, ['controller' => 'Projects', 'action' => 'view', $projectPhoto->project->id]) : '' ?></td>
                    <td><?= $this->Number->format($projectPhoto->sort_order) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $projectPhoto->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $projectPhoto->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $projectPhoto->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $projectPhoto->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>