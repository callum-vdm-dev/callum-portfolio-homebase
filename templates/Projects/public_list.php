<?php
/**
 * @var \App\View\AppView                $this
 * @var \Cake\Datasource\ResultSetInterface|\App\Model\Entity\Project[] $projects
 */
$this->assign('title', 'Projects');
?>
<section id="projects" class="main style2 special fade-up">
    <div class="inner">
        <header class="major">
            <h2>Projects</h2>
            <p>A showcase of my work</p>
        </header>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php foreach ($projects as $project): ?>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <div class="mb-3">
                                <?php $icon = $project->status === 'completed' ? 'check' : 'spinner'; ?>
                                <span class="text-muted me-2"><i class="fa fa-<?= $icon ?>"></i></span>
                                <span class="badge bg-<?= $project->status === 'completed' ? 'success' : 'warning' ?>">
                            <?= h(ucfirst($project->status)) ?>
                        </span>
                            </div>

                            <h5 class="card-title">
                                <?= $this->Html->link(
                                    h($project->title),
                                    ['action' => 'publicView', $project->id],
                                    ['class' => 'stretched-link text-decoration-none']
                                ) ?>
                            </h5>

                            <p class="text-muted mb-2">
                                <small>
                                    <strong>Started:</strong> <?= h($project->start_date->format('Y-m-d')) ?><br>
                                    <strong>Updated:</strong> <?= h($project->modified->format('Y-m-d')) ?><br>
                                    <strong>By:</strong> <?= h($project->user->name ?? '—') ?>
                                </small>
                            </p>

                            <p class="card-text mt-auto">
                                <?= h($this->Text->truncate($project->overview, 120)) ?>
                            </p>
                        </div>

                        <div class="card-footer d-flex gap-2">
                            <?php if ($project->live_url): ?>
                                <a href="<?= h($project->live_url) ?>" target="_blank" class="btn btn-primary btn-sm w-100">Live Demo</a>
                            <?php endif ?>
                            <?php if ($project->github_url): ?>
                                <a href="<?= h($project->github_url) ?>" target="_blank" class="btn btn-outline-secondary btn-sm w-100">GitHub</a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- optional: pagination -->
        <?php if ($this->Paginator->hasPrev() || $this->Paginator->hasNext()): ?>
            <div class="pagination-wrapper">
                <ul class="pagination">
                    <?= $this->Paginator->prev('< Prev') ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next('Next >') ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</section>
