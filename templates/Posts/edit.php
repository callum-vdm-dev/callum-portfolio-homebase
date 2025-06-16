<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 * @var string[]|\Cake\Collection\CollectionInterface $projects
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Post</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><?= $this->Html->link('Dashboard', ['controller' => 'Users', 'action' => 'dashboard']) ?></li>
        <li class="breadcrumb-item"><?= $this->Html->link('Posts', ['action' => 'index']) ?></li>
        <li class="breadcrumb-item active">Edit Post</li>
    </ol>

    <div class="card mb-4">
        <div class="card-body">
            <?= $this->Form->create($post, ['class' => 'row g-3', 'id' => 'post-form']) ?>

            <div class="col-md-6">
                <?= $this->Form->control('title', [
                    'class' => 'form-control',
                    'placeholder' => 'Enter post title'
                ]) ?>
            </div>

            <div class="col-md-6">
                <?= $this->Form->control('slug', [
                    'class' => 'form-control',
                    'placeholder' => 'custom-url-slug'
                ]) ?>
            </div>

            <div class="col-md-12">
                <label for="editor" class="form-label">Post Content</label>
                <div id="quill-editor" style="height: 300px;"></div>
                <?= $this->Form->control('text', [
                    'type' => 'hidden',
                    'id' => 'text',
                    'label' => false
                ]) ?>
            </div>

            <div class="col-md-6">
                <?= $this->Form->control('status', [
                    'type' => 'select',
                    'options' => ['draft' => 'Draft', 'published' => 'Published', 'archived' => 'Archived'],
                    'class' => 'form-select',
                    'label' => 'Status'
                ]) ?>
            </div>

            <div class="col-md-6">
                <?= $this->Form->control('project_id', [
                    'options' => $projects,
                    'empty' => 'Select Project (optional)',
                    'class' => 'form-select',
                    'label' => 'Linked Project'
                ]) ?>
            </div>

            <div class="col-md-6">
                <?= $this->Form->control('user_id', [
                    'options' => $users,
                    'class' => 'form-select',
                    'label' => 'Author'
                ]) ?>
            </div>

            <div class="col-12 d-flex justify-content-between mt-4">
                <?= $this->Form->button(__('Save Changes'), ['class' => 'btn btn-primary']) ?>
                <?= $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $post->id],
                    ['confirm' => __('Are you sure you want to delete this post?'), 'class' => 'btn btn-danger']
                ) ?>
                <?= $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
            </div>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<!-- Quill setup script -->
<?= $this->element('quill_editor_setup') ?>
