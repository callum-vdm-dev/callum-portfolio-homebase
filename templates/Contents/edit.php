<?php
/**
 * @var \App\View\AppView          $this
 * @var \App\Model\Entity\Content  $content
 */
?>
<div class="container-fluid px-4">
    <h1 class="mt-4"><?= __('Edit Content') ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <?= $this->Html->link('Dashboard', ['controller' => 'Users', 'action' => 'dashboard']) ?>
        </li>
        <li class="breadcrumb-item">
            <?= $this->Html->link('Content Blocks', ['controller' => 'Contents', 'action' => 'index']) ?>
        </li>
        <li class="breadcrumb-item active"><?= __('Edit Content') ?></li>
    </ol>

    <div class="card mb-4">
        <div class="card-body">
            <?= $this->Form->create($content, [
                'class' => 'row g-3',
                'id'    => 'content-form',
                'type'  => 'file'
            ]) ?>

            <div class="col-md-6">
                <?= $this->Form->control('slug', [
                    'class'       => 'form-control',
                    'placeholder' => 'e.g. homepage',
                    'label'       => 'Slug'
                ]) ?>
            </div>

            <div class="col-md-6">
                <?= $this->Form->control('title', [
                    'class'       => 'form-control',
                    'placeholder' => 'e.g. hero_title',
                    'label'       => 'Title'
                ]) ?>
            </div>

            <?php if ($content->type === 'image'): ?>
                <div class="col-md-12">
                    <label class="form-label"><?= __('Current Image') ?></label><br>
                    <?php if (!empty($content->content)): ?>
                        <img src="<?= $this->Url->build('/images/'. h($content->content)) ?>"
                             alt="<?= h($content->title) ?>"
                             class="img-fluid mb-3"
                             style="max-height: 300px;">
                    <?php else: ?>
                        <p class="text-muted fst-italic">No image uploaded yet.</p>
                    <?php endif; ?>
                </div>

                <div class="col-md-12">
                    <?= $this->Form->control('new_image', [
                        'type'  => 'file',
                        'label' => 'Replace Image',
                        'class' => 'form-control',
                        'required' => false
                    ]) ?>
                    <div class="form-text">Upload a new image to replace the current one. The filename will stay the same.</div>
                </div>
            <?php else: ?>
                <div class="col-md-12">
                    <label for="editor-content" class="form-label"><?= __('Content') ?></label>
                    <?= $this->element('quill_editor_setup', [
                        'editorId'       => 'editor-content',
                        'fieldName'      => 'content',
                        'initialContent' => $content->content ?? ''
                    ]) ?>
                </div>
            <?php endif; ?>

            <div class="col-12 d-flex justify-content-between mt-4">
                <?= $this->Form->button(__('Save Changes'), ['class' => 'btn btn-primary']) ?>
                <?= $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $content->id],
                    [
                        'confirm' => __('Are you sure you want to delete this content?'),
                        'class'   => 'btn btn-danger'
                    ]
                ) ?>
                <?= $this->Html->link(__('Cancel'), ['action' => 'index'], [
                    'class' => 'btn btn-secondary'
                ]) ?>
            </div>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
