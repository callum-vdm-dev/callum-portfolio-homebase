<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Welcome, <?= h($authUser->name) ?>!</li>
            </ol>

            <div class="mb-4">
                <div class="d-flex flex-wrap gap-2">
                    <?= $this->Html->link('Add Post', ['controller' => 'Posts', 'action' => 'add'], ['class' => 'btn btn-primary']) ?>
                    <?= $this->Html->link('Manage Posts', ['controller' => 'Posts', 'action' => 'index'], ['class' => 'btn btn-secondary']) ?>
                    <?= $this->Html->link('Add Project', ['controller' => 'Projects', 'action' => 'add'], ['class' => 'btn btn-success']) ?>
                    <?= $this->Html->link('Manage Projects', ['controller' => 'Projects', 'action' => 'index'], ['class' => 'btn btn-warning text-white']) ?>
                </div>
            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
<!--                <div class="text-muted">Copyright &copy; Your Website --><?php //= date('Y') ?><!--</div>-->
<!--                <div>-->
<!--                    <a href="#">Privacy Policy</a>-->
<!--                    &middot;-->
<!--                    <a href="#">Terms &amp; Conditions</a>-->
<!--                </div>-->
            </div>
        </div>
    </footer>
</div>
