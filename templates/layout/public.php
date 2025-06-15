<!DOCTYPE HTML>
<!--
	Photon by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>Photon by HTML5 UP</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <?= $this->Html->css('public-facing/main.css') ?>
    <noscript>
        <?= $this->Html->css('public-facing/noscript.css') ?>
    </noscript>
</head>
<body class="is-preload">
<!-- Nav -->
<nav id="nav" class="custom-navbar">
    <ul>
        <li>
            <a href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'index']) ?>">Projects</a>
            <ul>
                <li><a href="#">Lorem ipsum dolor</a></li>
                <li><a href="#">Magna phasellus</a></li>
                <li><a href="#">Etiam dolore nisl</a></li>
                <li>
                    <a href="#">Phasellus consequat</a>
                    <ul>
                        <li><a href="#">Lorem ipsum dolor</a></li>
                        <li><a href="#">Phasellus consequat</a></li>
                        <li><a href="#">Magna phasellus</a></li>
                        <li><a href="#">Etiam dolore nisl</a></li>
                    </ul>
                </li>
                <li><a href="#">Veroeros feugiat</a></li>
            </ul>
        </li>
        <li><a href="<?= $this->Url->build(['controller' => 'Posts', 'action' => 'index']) ?>">Blog</a></li>
        <li class="break"><a href="#contact">Contact</a></li>
    </ul>
</nav>

<?= $this->fetch('content') ?>

<!-- Footer -->
<section id="footer">
    <ul class="icons">
        <li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
        <li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
        <li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
        <li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
        <li><a href="#" class="icon solid alt fa-envelope"><span class="label">Email</span></a></li>
    </ul>
    <ul class="copyright">
        <li>&copy; Untitled</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
    </ul>
</section>

<!-- Scripts -->
<?= $this->Html->script('public-facing/jquery.min.js') ?>
<?= $this->Html->script('public-facing/jquery.scrolly.min.js') ?>
<?= $this->Html->script('public-facing/browser.min.js') ?>
<?= $this->Html->script('public-facing/breakpoints.min.js') ?>
<?= $this->Html->script('public-facing/util.js') ?>
<?= $this->Html->script('public-facing/main.js') ?>
</body>
</html>
