<?php
/**
 * @var \App\View\AppView          $this
 * @var \App\Model\Entity\Project  $project
 */
$this->assign('title', $project->title);
?>
<section id="project" class="main style1 fade-up pt-6 pb-5">
    <div class="container">
        <!-- Header -->
        <div class="text-center mb-5">
            <h2 class="mb-3 text-light"><?= h($project->title) ?></h2>
            <div class="project-meta d-inline-flex flex-wrap justify-content-center align-items-center small text-muted">
    <span class="badge bg-<?= $project->status === 'completed' ? 'success' : 'warning' ?>">
      <?php
      if ($project->status === 'in_progress') {
          echo h('In Progress');
      } else{
          echo h(ucfirst($project->status));
      }      ?>
    </span>
                <span><strong>Started:</strong> <?= h($project->start_date->format('Y-m-d')) ?></span>
                <span><strong>Updated:</strong> <?= h($project->modified->format('Y-m-d')) ?></span>
                <span><strong>By:</strong> <?= h($project->user->name ?? '—') ?></span>
            </div>
        </div>



        <!-- CTA Buttons -->
        <div class="text-center mb-4">
            <ul class="list-inline">
                <?php if ($project->live_url): ?>
                    <li class="list-inline-item">
                        <a href="<?= h($project->live_url) ?>" target="_blank" class="btn btn-primary btn-lg">
                            Live Demo
                        </a>
                    </li>
                <?php endif ?>
                <?php if ($project->github_url): ?>
                    <li class="list-inline-item">
                        <a href="<?= h($project->github_url) ?>" target="_blank" class="btn btn-outline-secondary btn-lg">
                            GitHub
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </div>

        <!-- Image Gallery -->
        <?php if (!empty($project->project_photos)): ?>
            <div class="row row-cols-1 row-cols-md-2 g-4 mb-5">
                <?php foreach ($project->project_photos as $photo): ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <img src="<?= $this->Url->build('/uploads/' . h($photo->path)) ?>"
                                 class="card-img-top"
                                 alt="<?= h($photo->title) ?>"
                                 style="object-fit: cover; height: 200px;">
                            <div class="card-body">
                                <h5 class="card-title"><?= h($photo->title) ?></h5>
                                <p class="card-text"><?= h($photo->caption) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>


        <!-- Content -->
            <div class="content-dark">
                <?= $project->overview ?>
            </div>

        <!-- Back Button -->
        <div class="text-center mt-3">
            <?= $this->Html->link('← Back to Projects', ['action' => 'publicList'], [
                'class' => 'btn btn-outline-light btn-lg'
            ]) ?>
        </div>
        </div>
</section>
