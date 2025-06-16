<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Add New User</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><?= $this->Html->link('Dashboard', ['controller' => 'Users', 'action' => 'dashboard']) ?></li>
        <li class="breadcrumb-item"><?= $this->Html->link('Users', ['action' => 'index']) ?></li>
        <li class="breadcrumb-item active">Add User</li>
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
                <?= $this->Form->control('password', [
                    'class' => 'form-control',
                    'placeholder' => 'Password'
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

            <div class="col-12">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
                <?= $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'btn btn-secondary ms-2']) ?>
            </div>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
