<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit User</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><?= $this->Html->link('Dashboard', ['controller' => 'Users', 'action' => 'dashboard']) ?></li>
        <li class="breadcrumb-item"><?= $this->Html->link('Users', ['action' => 'index']) ?></li>
        <li class="breadcrumb-item active">Edit User</li>
    </ol>

    <div class="card mb-4">
        <div class="card-body">
            <?= $this->Form->create($user, ['class' => 'row g-3']) ?>

            <div class="col-md-6">
                <?= $this->Form->control('name', [
                    'class' => 'form-control',
                    'placeholder' => 'Full Name'
                ]) ?>
            </div>

            <div class="col-md-6">
                <?= $this->Form->control('email', [
                    'class' => 'form-control',
                    'placeholder' => 'Email Address'
                ]) ?>
            </div>

            <div class="col-md-6">
                <?= $this->Form->control('role', [
                    'type' => 'select',
                    'options' => ['admin' => 'Admin', 'viewer' => 'Viewer'],
                    'empty' => 'Select Role',
                    'class' => 'form-select'
                ]) ?>
            </div>

            <div class="col-12 d-flex justify-content-between">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
                <div>
                    <?= $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'btn btn-secondary ms-2']) ?>
                    <?= $this->Form->postLink(
                        __('Delete'),
                        ['action' => 'delete', $user->id],
                        [
                            'confirm' => __('Are you sure you want to delete # {0}?', $user->id),
                            'class' => 'btn btn-danger ms-2'
                        ]
                    ) ?>
                </div>
            </div>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
