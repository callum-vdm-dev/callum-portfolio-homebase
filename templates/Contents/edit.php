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
                <label class="form-label"><?= __('Slug') ?></label>
                <input type="text" class="form-control" value="<?= h($content->slug) ?>" disabled>
            </div>

            <div class="col-md-6">
                <label class="form-label"><?= __('Title') ?></label>
                <input type="text" class="form-control" value="<?= h($content->title) ?>" disabled>
            </div>

<!--            Edit image handling-->
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

<!--         Edit file handling-->
            <?php elseif ($content->type === 'file'): ?>
                <div class="col-md-12">
                    <label class="form-label"><?= __('Current File') ?></label><br>
                    <?php if (!empty($content->content)): ?>
                        <a href="<?= $this->Url->build('/documents/' . h($content->content)) ?>"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="btn btn-outline-primary">
                            View / Download File
                        </a>
                    <?php else: ?>
                        <p class="text-muted fst-italic">No file uploaded yet.</p>
                    <?php endif; ?>
                </div>

                <div class="col-md-12">
                    <?= $this->Form->control('new_file', [
                        'type'  => 'file',
                        'label' => 'Replace File',
                        'class' => 'form-control',
                        'required' => false
                    ]) ?>
                    <div class="form-text">Upload a new file to replace the current one. The filename will stay the same.</div>
                </div>

<!--            Edit link handling-->
            <?php elseif ($content->type === 'link'): ?>
                <div class="col-md-12">
                    <?= $this->Form->control('content', [
                        'type'        => 'url',
                        'label'       => 'Link URL',
                        'class'       => 'form-control',
                        'placeholder' => 'https://example.com',
                        'value'       => $content->content ?? ''
                    ]) ?>
                </div>

<!--            Edit slug handling-->
            <?php elseif ($content->type === 'slug'): ?>
                <div class="col-md-12">
                    <?= $this->Form->control('content', [
                        'type'        => 'text',
                        'label'       => 'Slug',
                        'class'       => 'form-control',
                        'placeholder' => 'e.g. my-project-slug',
                        'value'       => $content->content ?? ''
                    ]) ?>
                    <div class="form-text">This will be used in the URL. Only lowercase letters, numbers, and hyphens are recommended.</div>
                </div>

<!--            Edit email handling-->
            <?php elseif ($content->type === 'email'): ?>
                <div class="col-md-12">
                    <?= $this->Form->control('content', [
                        'type'  => 'email',
                        'label' => 'Email Address',
                        'class' => 'form-control',
                        'value' => $content->content ?? ''
                    ]) ?>
                </div>

<!--            Default handling (catered for text editing)-->
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
                <?= $this->Html->link(__('Cancel'), ['action' => 'index'], [
                    'class' => 'btn btn-secondary'
                ]) ?>
            </div>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
