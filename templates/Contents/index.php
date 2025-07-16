<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Content> $contents
 */
?>
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
        <h1 class="h3"><?= __('Content Blocks') ?></h1>
        <?= $this->Html->link(__('New Content'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
    </div>

    <div class="card mb-4">
        <div class="card-body table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-light">
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('slug') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="text-center"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($contents as $content): ?>
                    <tr>
                        <td><?= $this->Number->format($content->id) ?></td>
                        <td><?= h($content->slug) ?></td>
                        <td><?= h($content->title) ?></td>
                        <td><?= h($content->modified) ?></td>
                        <td class="text-nowrap text-center">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $content->id], ['class' => 'btn btn-sm btn-outline-primary me-1']) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $content->id], ['class' => 'btn btn-sm btn-outline-secondary me-1']) ?>
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
