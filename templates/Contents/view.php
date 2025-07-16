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
            <?php if ($content->type === 'image'): ?>
                <?php if (!empty($content->content)): ?>
                    <img src="<?= $this->Url->build('/images/' . h($content->content)) ?>"
                         alt="<?= h($content->title) ?>"
                         class="img-fluid mb-3"
                         style="max-height: 300px;">
                <?php else: ?>
                    <p class="text-muted fst-italic">No image uploaded yet.</p>
                <?php endif; ?>
            <?php else: ?>
                <blockquote class="blockquote p-3 bg-light border rounded">
                    <?= $content->content ?>
                </blockquote>
            <?php endif; ?>
        </div>
    </div>
</div>
