<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 * @var \Cake\Collection\CollectionInterface|string[] $projects
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Add New Post</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><?= $this->Html->link('Dashboard', ['controller' => 'Users', 'action' => 'dashboard']) ?></li>
        <li class="breadcrumb-item"><?= $this->Html->link('Posts', ['action' => 'index']) ?></li>
        <li class="breadcrumb-item active">Add Post</li>
    </ol>

    <div class="card mb-4">
        <div class="card-body">
            <?= $this->Form->create($post, ['class' => 'row g-3']) ?>
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
                <?= $this->Form->control('text', [
                    'type' => 'textarea',
                    'rows' => 8,
                    'class' => 'form-control',
                    'label' => 'Post Content'
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

            <div class="col-12">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
                <?= $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'btn btn-secondary ms-2']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
