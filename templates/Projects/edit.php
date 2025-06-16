<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Project</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><?= $this->Html->link('Dashboard', ['controller' => 'Users', 'action' => 'dashboard']) ?></li>
        <li class="breadcrumb-item"><?= $this->Html->link('Projects', ['action' => 'index']) ?></li>
        <li class="breadcrumb-item active">Edit Project</li>
    </ol>

    <div class="card mb-4">
        <div class="card-body">
            <?= $this->Form->create($project, ['class' => 'row g-3', 'id' => 'project-form']) ?>

            <div class="col-md-6">
                <?= $this->Form->control('title', [
                    'class' => 'form-control',
                    'placeholder' => 'Enter project title'
                ]) ?>
            </div>

            <div class="col-md-6">
                <?= $this->Form->control('slug', [
                    'class' => 'form-control',
                    'placeholder' => 'custom-url-slug'
                ]) ?>
            </div>

            <div class="col-md-12">
                <label for="editor" class="form-label">Project Overview</label>
                <div id="quill-editor" style="height: 200px;"></div>
                <?= $this->Form->control('overview', [
                    'type' => 'hidden',
                    'id' => 'overview',
                    'name' => 'overview',
                    'label' => false,
                    'value' => $project->overview // pass value to prefill Quill editor
                ]) ?>
            </div>

            <div class="col-md-6">
                <?= $this->Form->control('github_url', [
                    'class' => 'form-control',
                    'placeholder' => 'https://github.com/yourproject'
                ]) ?>
            </div>

            <div class="col-md-6">
                <?= $this->Form->control('live_url', [
                    'class' => 'form-control',
                    'placeholder' => 'https://liveurl.com/project'
                ]) ?>
            </div>

            <div class="col-md-6">
                <?= $this->Form->control('status', [
                    'type' => 'select',
                    'options' => ['in_progress' => 'In Progress', 'completed' => 'Completed', 'archived' => 'Archived'],
                    'class' => 'form-select',
                    'empty' => 'Select Status'
                ]) ?>
            </div>

            <div class="col-md-6">
                <?= $this->Form->control('start_date', [
                    'type' => 'date',
                    'empty' => true,
                    'class' => 'form-control'
                ]) ?>
            </div>

            <div class="col-md-6">
                <?= $this->Form->control('user_id', [
                    'options' => $users,
                    'empty' => 'Select Author',
                    'class' => 'form-select'
                ]) ?>
            </div>

            <div class="col-12 d-flex justify-content-between">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
                <div>
                    <?= $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'btn btn-secondary ms-2']) ?>
                    <?= $this->Form->postLink(
                        __('Delete'),
                        ['action' => 'delete', $project->id],
                        [
                            'confirm' => __('Are you sure you want to delete # {0}?', $project->id),
                            'class' => 'btn btn-danger ms-2'
                        ]
                    ) ?>
                </div>
            </div>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const quill = new Quill('#quill-editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ header: [1, 2, false] }],
                    ['bold', 'italic', 'underline'],
                    ['link', 'image'],
                    [{ list: 'ordered' }, { list: 'bullet' }],
                    ['clean']
                ]
            }
        });

        const overviewField = document.getElementById('overview');
        // Set the editor content from the hidden input value
        quill.root.innerHTML = overviewField.value;

        const form = document.getElementById('project-form');
        form.addEventListener('submit', function () {
            overviewField.value = quill.root.innerHTML;
        });
    });
</script>
