<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\ResultSetInterface|\App\Model\Entity\Project[] $projects
 * @var $projectsContent
 */
$this->assign('title', 'Projects');
?>

<section id="projects" class="main style2" style="padding-top: 100px;">
    <div class="container">
        <!-- Page Header -->
        <header class="text-center mb-5">
            <h1 class="display-4"><?= $projectsContent['title'] ?? 'Projects' ?></h1>
            <p class="lead"><?= $projectsContent['intro'] ?? 'See what I have done!' ?></p>
        </header>

        <!-- Projects Grid -->
        <div class="row">
            <?php foreach ($projects as $project): ?>
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-sm border-0" style="background: rgba(0,0,0,0.7); color: #fff; border-radius: 1rem;">
                        <div class="card-body d-flex flex-column">
                            <?php
                            // Determine the badge color based on project status
                            $badgeColor = (
                            $project->status === 'completed' ? 'success' :
                                ($project->status === 'in_progress' ? 'warning' : 'secondary')
                            );
                            ?>
                            <!-- Row 1: Project Title and Status -->
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h3 class="card-title mb-0">
                                    <?= $this->Html->link(
                                        h($project->title),
                                        ['action' => 'publicView', $project->slug],
                                        ['class' => 'stretched-link text-decoration-none text-white']
                                    ) ?>
                                </h3>
                                <span class="badge bg-<?php echo $badgeColor; ?>">
                  <?= ($project->status === 'in_progress') ? h('In Progress') : h(ucfirst($project->status)); ?>
                </span>
                            </div>

                <!-- Row 2: Meta Details -->
                <div class="project-meta">
                      <span>
                        <i class="fa fa-calendar-alt me-2"></i>
                        <span class="mx-1"></span>
                        <span><?= $project->start_date ? h($project->start_date->format('Y-m-d')) : '-' ?></span>
                      </span>
                                                    <span>
                        <i class="fa fa-edit me-2"></i>
                        <span class="mx-1"></span>
                        <span><?= h($project->modified->format('Y-m-d')) ?></span>
                      </span>
                                                    <span>
                        <i class="fa fa-user me-2"></i>
                        <span class="mx-1"></span>
                        <span><?= h($project->user->name ?? '-') ?></span>
                      </span>
                </div>
                            <p class="card-text mt-auto">
                                <?= h($this->Project->extractSummaryAfterHeading($project->overview), 150) ?>
                            </p>
                        </div>
                        <div class="card-footer bg-transparent border-top-0">
                            <div class="d-flex justify-content-between">
                                <?php if ($project->live_url): ?>
                                    <a href="<?= h($project->live_url) ?>" target="_blank" class="btn btn-primary btn-sm">
                                        Live Demo
                                    </a>
                                <?php endif; ?>
                                <?php if ($project->github_url): ?>
                                    <a href="<?= h($project->github_url) ?>" target="_blank" class="btn btn-outline-light btn-sm">
                                        GitHub
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Pagination -->
        <?php if ($this->Paginator->hasPrev() || $this->Paginator->hasNext()): ?>
            <nav class="mt-4">
                <ul class="pagination justify-content-center">
                    <?= $this->Paginator->prev('< Prev', ['class' => 'page-item'], null, ['class' => 'page-link']) ?>
                    <?= $this->Paginator->numbers(['class' => 'page-item', 'linkClass' => 'page-link']) ?>
                    <?= $this->Paginator->next('Next >', ['class' => 'page-item'], null, ['class' => 'page-link']) ?>
                </ul>
            </nav>
        <?php endif; ?>
    </div>
</section>
