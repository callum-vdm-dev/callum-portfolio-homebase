<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\PostPhoto> $postPhotos
 */
?>
<div class="postPhotos index content">
    <?= $this->Html->link(__('New Post Photo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Post Photos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('path') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('post_id') ?></th>
                    <th><?= $this->Paginator->sort('sort_order') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($postPhotos as $postPhoto): ?>
                <tr>
                    <td><?= $this->Number->format($postPhoto->id) ?></td>
                    <td><?= h($postPhoto->title) ?></td>
                    <td><?= h($postPhoto->path) ?></td>
                    <td><?= h($postPhoto->created) ?></td>
                    <td><?= $postPhoto->hasValue('post') ? $this->Html->link($postPhoto->post->title, ['controller' => 'Posts', 'action' => 'view', $postPhoto->post->id]) : '' ?></td>
                    <td><?= $this->Number->format($postPhoto->sort_order) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $postPhoto->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $postPhoto->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $postPhoto->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $postPhoto->id),
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