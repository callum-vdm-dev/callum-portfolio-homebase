<!DOCTYPE HTML>
<!--
	Photon by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>My Porfolio</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="icon" href="<?= $this->Url->build('/images/favicon.ico') ?>" sizes="32x32">
    <link rel="icon" href="<?= $this->Url->build('/images/favicon.svg') ?>" type="image/svg+xml">

    <noscript>
        <?= $this->Html->css('public-facing/noscript.css') ?>
    </noscript>
    <?= $this->Html->css('public-facing/main.css') ?>
    <?= $this->Html->css('public-facing/lists.css') ?>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css" rel="stylesheet" />
</head>
<body class="is-preload" id="test">
<!-- Nav -->
<nav id="nav" class="custom-navbar">
    <div class="navbar-container">
        <button class="navbar-toggle" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <i class="fas fa-bars"></i>
        </button>
        <ul class="navbar-menu">
            <li><a href="<?= $this->Url->build('/') ?>">Home</a></li>
            <li><a href="<?= $this->Url->build('/projects') ?>">Projects</a></li>
            <li><a href="<?= $this->Url->build('/blog') ?>">Blog</a></li>
            <li class="break"><a href="#custom-section" class="scroll-to-contact">Reach Out</a></li>
        </ul>
    </div>
</nav>



<?= $this->fetch('content') ?>

<!-- Footer -->
<section id="footer">
    <?= $this->cell('FooterLinks::display') ?>
</section>
<?= $this->element('scroll_to_top') ?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<!-- Scripts -->
<?= $this->Html->script('public-facing/jquery.min.js') ?>
<?= $this->Html->script('public-facing/jquery.scrolly.min.js') ?>
<?= $this->Html->script('public-facing/browser.min.js') ?>
<?= $this->Html->script('public-facing/breakpoints.min.js') ?>
<?= $this->Html->script('public-facing/util.js') ?>
<?= $this->Html->script('public-facing/main.js') ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const contactLink = document.querySelector('.scroll-to-contact');

        if (contactLink) {
            contactLink.addEventListener('click', function (e) {
                const currentPath = window.location.pathname;
                const isHome = currentPath === '/' || currentPath === '<?= $this->Url->build('/') ?>';

                if (isHome) {
                    // Already on homepage scroll nicely to #contact
                    e.preventDefault();
                    const contactSection = document.getElementById('custom-section');
                    if (contactSection) {
                        contactSection.scrollIntoView({ behavior: 'smooth' });
                    }
                } else {
                    // Not on homepage go to homepage
                    contactLink.setAttribute('href', '<?= $this->Url->build('/') ?>#custom-section');
                }
            });
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggle = document.querySelector('.navbar-toggle');
        const menu = document.querySelector('.navbar-menu');

        if (toggle && menu) {
            toggle.addEventListener('click', function () {
                menu.classList.toggle('show');
            });
        }
    });
</script>

</body>
</html>
