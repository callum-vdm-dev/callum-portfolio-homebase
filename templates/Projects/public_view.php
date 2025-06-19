<?php
/**
 * @var \App\View\AppView          $this
 * @var \App\Model\Entity\Project  $project
 */
$this->assign('title', $project->title);
?>
<section id="project" class="wrapper style1 fade-up">
    <div class="inner">
        <!-- Header -->
        <header class="major">
            <h2><?= h($project->title) ?></h2>
            <p>
        <span class="badge bg-<?= $project->status === 'completed' ? 'success' : 'warning' ?>">
          <?= h(ucfirst($project->status)) ?>
        </span>
            </p>
        </header>

        <!-- Call-to-Action Buttons -->
        <ul class="actions special">
            <?php if ($project->live_url): ?>
                <li><a href="<?= h($project->live_url) ?>" target="_blank" class="button big">Live Demo</a></li>
            <?php endif ?>
            <?php if ($project->github_url): ?>
                <li><a href="<?= h($project->github_url) ?>" target="_blank" class="button big alt">GitHub</a></li>
            <?php endif ?>
        </ul>

        <!-- Image Gallery (if any) -->
        <?php if (!empty($project->project_photos)): ?>
            <div class="features small">
                <?php foreach ($project->project_photos as $photo): ?>
                    <article>
        <span class="icon">
          <img src="<?= $this->Url->build('/uploads/' . h($photo->path)) ?>"
               alt="<?= h($photo->title) ?>"
               style="max-width:100%;border-radius:4px;" />
        </span>
                        <div class="content">
                            <h4><?= h($photo->title) ?></h4>
                            <p><?= h($photo->caption) ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif ?>

        <!-- Overview -->
        <section>
            <h3>Overview</h3>
            <div class="content">
                <?= $project->overview ?>
            </div>
        </section>

        <!-- Meta Info -->
        <ul class="stats">
            <li><strong>Started:</strong> <?= h($project->start_date->format('Y-m-d')) ?></li>
            <li><strong>Last Updated:</strong> <?= h($project->modified->format('Y-m-d')) ?></li>
            <li><strong>Author:</strong> <?= h($project->user->name ?? '—') ?></li>
        </ul>
    </div>
</section>
