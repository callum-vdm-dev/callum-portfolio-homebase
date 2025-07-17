<ul class="icons">
    <?php if (!empty(trim(strip_tags($footerContents['GitHub'] ?? '')))): ?>
        <li>
            <a href="<?= h(strip_tags($footerContents['GitHub'])) ?>" class="icon brands alt fa-github" target="_blank" rel="noopener noreferrer">
                <span class="label">GitHub</span>
            </a>
        </li>
    <?php endif; ?>

    <?php if (!empty(trim(strip_tags($footerContents['LinkedIn'] ?? '')))): ?>
        <li>
            <a href="<?= h(strip_tags($footerContents['LinkedIn'])) ?>" class="icon brands alt fa-linkedin" target="_blank" rel="noopener noreferrer">
                <span class="label">LinkedIn</span>
            </a>
        </li>
    <?php endif; ?>

    <?php if (!empty(trim(strip_tags($footerContents['Email'] ?? '')))): ?>
        <li>
            <a href="mailto:<?= h(strip_tags($footerContents['Email'])) ?>" class="icon solid alt fa-envelope">
                <span class="label">Email</span>
            </a>
        </li>
    <?php endif; ?>
</ul>

<ul class="copyright">
    <?php if (!empty(trim(strip_tags($footerContents['copyright'] ?? '')))): ?>
        <li>&copy; <?= h(strip_tags($footerContents['copyright'])) ?></li>
    <?php endif; ?>
    <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
</ul>
