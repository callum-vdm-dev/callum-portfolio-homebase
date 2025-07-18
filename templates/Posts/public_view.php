<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
$this->assign('title', $post->title);
?>

<section id="blog-post" class="main style1 fade-up pt-6 pb-5">
    <div class="container">
        <!-- Title and Metadata -->
        <div class="text-center mb-5">
            <h1 class="mb-3 text-light"><?= h($post->title) ?></h1>
            <div class="text-muted small">
                <span><i class="fa fa-user me-1"></i> <?= h($post->user->name ?? 'Unknown') ?></span>
                <span class="mx-2">|</span>
                <span><i class="fa fa-calendar-alt me-1"></i> <?= h($post->created->format('Y-m-d')) ?></span>
                <?php if ($post->project): ?>
                    <span class="mx-2">|</span>
                    <span><i class="fa fa-project-diagram me-1"></i>
                        Related Project:
                        <?= $this->Html->link(
                            h($post->project->title),
                            ['controller' => 'Projects', 'action' => 'publicView', $post->project->slug],
                            ['class' => 'text-decoration-underline']
                        ) ?>
                    </span>
                <?php endif; ?>
            </div>
        </div>

        <!-- Blog Content -->
        <div class="content-dark mb-5">
            <?= $post->text ?>
        </div>

        <!-- Back Button -->
        <div class="text-center mt-4">
            <?= $this->Html->link('← Back to Blog', ['action' => 'publicList'], [
                'class' => 'btn btn-outline-light btn-lg'
            ]) ?>
        </div>
    </div>
</section>
