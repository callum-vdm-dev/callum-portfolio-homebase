<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\ResultSetInterface|\App\Model\Entity\BlogPost[] $posts
 * @var postsContent
 */
$this->assign('title', 'Blog');
?>

<section id="blog" class="main style2" style="padding-top: 100px;">
    <div class="container">
        <!-- Page Header -->
        <header class="text-center mb-5">
            <h1 class="display-4"><?= $postsContent['title'] ?? 'Posts' ?></h1>
            <p class="lead"><?= $postsContent['intro'] ?? 'View my personal blog!' ?></p>
        </header>

        <!-- Post List -->
        <div class="row justify-content-center">
            <?php foreach ($posts as $post): ?>
                <div class="col-lg-8 mb-4">
                    <div class="card shadow-sm border-0" style="background: rgba(0,0,0,0.7); color: #fff; border-radius: 1rem;">
                        <div class="card-body">
                            <h3 class="card-title">
                                <?= $this->Html->link(
                                    h($post->title),
                                    ['action' => 'publicView', $post->slug],
                                    ['class' => 'stretched-link text-white text-decoration-none']
                                ) ?>
                            </h3>

                            <div class="small text-muted mb-2">
                                <span><i class="fa fa-calendar me-2"></i><?= ' ' . h($post->created->format('Y-m-d')) ?></span>
                                <span class="mx-2">|</span>
                                <span><i class="fa fa-user me-2"></i><?= ' ' . h($post->user->name ?? '-') ?></span>
                            </div>

                            <p class="card-text">
                                <?= h($this->Text->truncate(strip_tags($post->content), 200)) ?>
                            </p>
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
