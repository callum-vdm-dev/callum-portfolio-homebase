<?php
/**
 * @var \App\View\AppView                $this
 * @var \Cake\Datasource\ResultSetInterface|\App\Model\Entity\Project[] $projects
 */
$this->assign('title', 'Projects');
?>
<section id="projects" class="wrapper style2 special fade-up">
    <div class="inner">
        <header class="major">
            <h2>Projects</h2>
            <p>A showcase of my work</p>
        </header>

        <div class="features">
            <?php foreach ($projects as $project): ?>
                <article>
                    <?php $icon = $project->status === 'completed' ? 'check' : 'spinner'; ?>
                    <span class="icon fa-<?= $icon ?>"></span>

                    <div class="content">
                        <!-- Title -->
                        <h3>
                            <?= $this->Html->link(
                                h($project->title),
                                ['action' => 'publicView', $project->id]
                            ) ?>
                        </h3>

                        <!-- Meta line -->
                        <p class="project-meta">
            <span class="badge bg-<?= $project->status === 'completed' ? 'success' : 'warning' ?>">
              <?= h(ucfirst($project->status)) ?>
            </span>
                            <span class="ms-3"><strong>Started:</strong> <?= h($project->start_date->format('Y-m-d')) ?></span>
                            <span class="ms-3"><strong>Updated:</strong> <?= h($project->modified->format('Y-m-d')) ?></span>
                            <span class="ms-3"><strong>By:</strong> <?= h($project->user->name ?? '—') ?></span>
                        </p>

                        <!-- Overview -->
                        <p>
                            <?= h($this->Text->truncate($project->overview, 120)) ?>
                        </p>

                        <!-- Action Buttons -->
                        <ul class="actions">
                            <?php if ($project->live_url): ?>
                                <li>
                                    <a href="<?= h($project->live_url) ?>" class="button">Live Demo</a>
                                </li>
                            <?php endif ?>
                            <?php if ($project->github_url): ?>
                                <li>
                                    <a href="<?= h($project->github_url) ?>" class="button alt">GitHub</a>
                                </li>
                            <?php endif ?>
                        </ul>
                    </div>
                </article>
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
