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
    <link rel="stylesheet" href="public-facing/css/main.css" />
    <noscript><link rel="stylesheet" href="public-facing/css/noscript.css" /></noscript>
</head>
<body class="is-preload">
<!-- Nav -->
<nav id="nav" class="custom-navbar">
    <ul>
        <li>
            <a href="#">Dropdown</a>
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
        <li><a href="left-sidebar.html">Left Sidebar</a></li>
        <li class="break"><a href="right-sidebar.html">Right Sidebar</a></li>
        <li><a href="no-sidebar.html">No Sidebar</a></li>
    </ul>
</nav>
<?= $this->fetch('content') ?>

<!-- Scripts -->
<script src="public-facing/js/jquery.min.js"></script>
<script src="public-facing/js/jquery.scrolly.min.js"></script>
<script src="public-facing/js/browser.min.js"></script>
<script src="public-facing/js/breakpoints.min.js"></script>
<script src="public-facing/js/util.js"></script>
<script src="public-facing/js/main.js"></script>

</body>
</html>
