<?php
/**
 * @var homepageContents content from the db to inject into the page.
 */
$this->setLayout('public')
?>
<!-- Header -->
<section id="header">
    <div class="inner">
        <span class="icon solid major fa-code"></span>
<!--        hero_title-->
        <h1><?= $homepageContents['hero_title'] ?? 'Welcome!' ?></h1>
        <p><?= $homepageContents['hero_text'] ?? 'Have a look around!' ?></p>
        <ul class="actions special">
            <li><a href="#about" class="button scrolly">
                    <?= $homepageContents['hero_button_text'] ?? 'Discover' ?>
                </a></li>
        </ul>
    </div>
</section>

<!-- One -->
<section id="about" class="main style1">
    <div class="container">
        <div class="row gtr-150">
            <div class="col-6 col-12-medium">
                <header class="major">
                    <h2><?= $homepageContents['about_title']??'About Me' ?></h2>
                </header>
                <p><?= $homepageContents['about_text']??'This is where I will tell my story.' ?></p>
            </div>
            <div class="col-6 col-12-medium imp-medium">
                <span class="image fit"><img src="images/about_me_picture.jpg" alt="" /></span>
            </div>
        </div>
    </div>
</section>

<!-- Two -->
<section id="projects" class="main style2">
    <div class="container">
        <div class="card section-header">
            <header class="major special">
                <h2><?= $homepageContents['projects_title'] ?? 'My Projects' ?></h2>
                <p><?= $homepageContents['projects_text'] ?? 'Featured projects I have worked on' ?></p>
            </header>
        </div>

        <div class="row gtr-150">
            <div class="col-6 col-12-medium">
                <div class="card project-card">
                    <span class="image fit">
                        <img src="images/project-1.jpg" alt="Project 1" />
                    </span>
                    <h3><?= $homepageContents['projects_1_title'] ?? 'First Project' ?></h3>
                    <p><?= $homepageContents['projects_1_text'] ?? 'Text about my first project' ?></p>
                    <ul class="actions" style="display: flex; justify-content: center;">
                        <li><a href="/projects/view/1" class="button">
                                <?= $homepageContents['projects_button'] ?? 'View' ?>
                            </a></li>
                    </ul>
                </div>
            </div>

            <div class="col-6 col-12-medium">
                <div class="card project-card">
                    <span class="image fit">
                        <img src="images/project-2.jpg" alt="Project 2" />
                    </span>
                    <h3><?= $homepageContents['projects_2_title'] ?? 'Second Project' ?></h3>
                    <p><?= $homepageContents['projects_2_text'] ?? 'Text about my second project' ?></p>
                    <ul class="actions" style="display: flex; justify-content: center;">
                        <li><a href="/projects/view/2" class="button">
                                <?= $homepageContents['projects_button'] ?? 'View' ?>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>

        <footer class="major">
            <ul class="actions special">
                <li><a href="projects" class="button primary">
                        <?= $homepageContents['projects_all_button'] ?? 'See All Projects' ?>
                    </a></li>
            </ul>
        </footer>
    </div>
</section>


<!-- Three -->
<section id="blog" class="main style2 special">
    <div class="container">
        <div class="card section-header">
            <header class="major">
                <h2><?= $homepageContents['blog_title'] ?? 'Blog Posts' ?></h2>
                <p><?= $homepageContents['blog_text'] ?? 'See what I have been posting' ?></p>
            </header>
        </div>

        <div class="row gtr-150">
            <div class="col-4 col-12-medium">
                <div class="card blog-card">
                    <h3><?= $homepageContents['blog_1_title'] ?? 'Post 1' ?></h3>
                    <p><?= $homepageContents['blog_1_text'] ?? 'Text about the first post' ?></p>
                    <ul class="actions special">
                        <li><a href="/blog/view/1" class="button"><?= $homepageContents['blog_button'] ?? 'Read' ?></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-4 col-12-medium">
                <div class="card blog-card">
                    <h3><?= $homepageContents['blog_2_title'] ?? 'Post 2' ?></h3>
                    <p><?= $homepageContents['blog_2_text'] ?? 'Text about the second post' ?></p>
                    <ul class="actions special">
                        <li><a href="/blog/view/2" class="button"><?= $homepageContents['blog_button'] ?? 'Read' ?></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-4 col-12-medium">
                <div class="card blog-card">
                    <h3><?= $homepageContents['blog_3_title'] ?? 'Post 3' ?></h3>
                    <p><?= $homepageContents['blog_3_text'] ?? 'Text about the third post' ?></p>
                    <ul class="actions special">
                        <li><a href="/blog/view/3" class="button"><?= $homepageContents['blog_button'] ?? 'Read' ?></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <footer class="major">
            <ul class="actions special">
                <li><a href="/blog" class="button primary">
                        <?= $homepageContents['blog_all_button'] ?? 'See All Posts' ?>
                    </a></li>
            </ul>
        </footer>
    </div>
</section>



<!-- Four -->
<section id="hire-me" class="main style1 special">
    <div class="container">
        <header class="major">
            <h2><?= $homepageContents['custom_title'] ?? 'Custom Section' ?></h2>
        </header>
        <p>
            <?= $homepageContents['custom_text'] ?? 'Text related to the custom section' ?>
        </p>
        <ul class="actions special">
            <li>
                <a href="<?= $this->Url->build('/documents/resume.pdf') ?>"
                   class="button wide primary"
                   target="_blank"
                   rel="noopener noreferrer">
                    <?= $homepageContents['resume_button_text'] ?? 'Resume' ?>
                </a>
            </li>
            <li>
                <a href="<?= $homepageContents['custom_button_link'] ?? '' ?>"
                   class="button wide"
                   target="_blank"
                   rel="noopener noreferrer">
                    <?= $homepageContents['custom_button_text'] ?? 'Get in Touch' ?>
                </a>
            </li>
        </ul>
    </div>
</section>

<!-- Five -->
<!--
    <section id="five" class="main style1">
        <div class="container">
            <header class="major special">
                <h2>Elements</h2>
            </header>

            <section>
                <h4>Text</h4>
                <p>This is <b>bold</b> and this is <strong>strong</strong>. This is <i>italic</i> and this is <em>emphasized</em>.
                This is <sup>superscript</sup> text and this is <sub>subscript</sub> text.
                This is <u>underlined</u> and this is code: <code>for (;;) { ... }</code>. Finally, <a href="#">this is a link</a>.</p>
                <hr />
                <header>
                    <h4>Heading with a Subtitle</h4>
                    <p>Lorem ipsum dolor sit amet nullam id egestas urna aliquam</p>
                </header>
                <p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing blandit tempus accumsan.</p>
                <header>
                    <h5>Heading with a Subtitle</h5>
                    <p>Lorem ipsum dolor sit amet nullam id egestas urna aliquam</p>
                </header>
                <p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing blandit tempus accumsan.</p>
                <hr />
                <h2>Heading Level 2</h2>
                <h3>Heading Level 3</h3>
                <h4>Heading Level 4</h4>
                <h5>Heading Level 5</h5>
                <h6>Heading Level 6</h6>
                <hr />
                <h5>Blockquote</h5>
                <blockquote>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan faucibus. Vestibulum ante ipsum primis in faucibus lorem ipsum dolor sit amet nullam adipiscing eu felis.</blockquote>
                <h5>Preformatted</h5>
                <pre><code>i = 0;

while (!deck.isInOrder()) {
print 'Iteration ' + i;
deck.shuffle();
i++;
}

print 'It took ' + i + ' iterations to sort the deck.';</code></pre>
            </section>

            <section>
                <h4>Lists</h4>
                <div class="row">
                    <div class="col-6 col-12-medium">
                        <h5>Unordered</h5>
                        <ul>
                            <li>Dolor pulvinar etiam.</li>
                            <li>Sagittis adipiscing.</li>
                            <li>Felis enim feugiat.</li>
                        </ul>
                        <h5>Alternate</h5>
                        <ul class="alt">
                            <li>Dolor pulvinar etiam.</li>
                            <li>Sagittis adipiscing.</li>
                            <li>Felis enim feugiat.</li>
                        </ul>
                    </div>
                    <div class="col-6 col-12-medium">
                        <h5>Ordered</h5>
                        <ol>
                            <li>Dolor pulvinar etiam.</li>
                            <li>Etiam vel felis viverra.</li>
                            <li>Felis enim feugiat.</li>
                            <li>Dolor pulvinar etiam.</li>
                            <li>Etiam vel felis lorem.</li>
                            <li>Felis enim et feugiat.</li>
                        </ol>
                        <h5>Icons</h5>
                        <ul class="icons">
                            <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
                            <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                            <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
                            <li><a href="#" class="icon brands fa-github"><span class="label">Github</span></a></li>
                        </ul>
                    </div>
                </div>
                <h5>Actions</h5>
                <div class="row">
                    <div class="col-6 col-12-medium">
                        <ul class="actions">
                            <li><a href="#" class="button primary">Default</a></li>
                            <li><a href="#" class="button">Default</a></li>
                        </ul>
                        <ul class="actions small">
                            <li><a href="#" class="button primary small">Small</a></li>
                            <li><a href="#" class="button small">Small</a></li>
                        </ul>
                        <ul class="actions stacked">
                            <li><a href="#" class="button primary">Default</a></li>
                            <li><a href="#" class="button">Default</a></li>
                        </ul>
                        <ul class="actions stacked">
                            <li><a href="#" class="button primary small">Small</a></li>
                            <li><a href="#" class="button small">Small</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-12-medium">
                        <ul class="actions stacked">
                            <li><a href="#" class="button primary fit">Default</a></li>
                            <li><a href="#" class="button fit">Default</a></li>
                        </ul>
                        <ul class="actions stacked">
                            <li><a href="#" class="button primary small fit">Small</a></li>
                            <li><a href="#" class="button small fit">Small</a></li>
                        </ul>
                    </div>
                </div>
            </section>

            <section>
                <h4>Table</h4>
                <h5>Default</h5>
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Item One</td>
                                <td>Ante turpis integer aliquet porttitor.</td>
                                <td>29.99</td>
                            </tr>
                            <tr>
                                <td>Item Two</td>
                                <td>Vis ac commodo adipiscing arcu aliquet.</td>
                                <td>19.99</td>
                            </tr>
                            <tr>
                                <td>Item Three</td>
                                <td> Morbi faucibus arcu accumsan lorem.</td>
                                <td>29.99</td>
                            </tr>
                            <tr>
                                <td>Item Four</td>
                                <td>Vitae integer tempus condimentum.</td>
                                <td>19.99</td>
                            </tr>
                            <tr>
                                <td>Item Five</td>
                                <td>Ante turpis integer aliquet porttitor.</td>
                                <td>29.99</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2"></td>
                                <td>100.00</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <h5>Alternate</h5>
                <div class="table-wrapper">
                    <table class="alt">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Item One</td>
                                <td>Ante turpis integer aliquet porttitor.</td>
                                <td>29.99</td>
                            </tr>
                            <tr>
                                <td>Item Two</td>
                                <td>Vis ac commodo adipiscing arcu aliquet.</td>
                                <td>19.99</td>
                            </tr>
                            <tr>
                                <td>Item Three</td>
                                <td> Morbi faucibus arcu accumsan lorem.</td>
                                <td>29.99</td>
                            </tr>
                            <tr>
                                <td>Item Four</td>
                                <td>Vitae integer tempus condimentum.</td>
                                <td>19.99</td>
                            </tr>
                            <tr>
                                <td>Item Five</td>
                                <td>Ante turpis integer aliquet porttitor.</td>
                                <td>29.99</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2"></td>
                                <td>100.00</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </section>

            <section>
                <h4>Buttons</h4>
                <ul class="actions">
                    <li><a href="#" class="button primary">Primary</a></li>
                    <li><a href="#" class="button">Default</a></li>
                </ul>
                <ul class="actions">
                    <li><a href="#" class="button large">Large</a></li>
                    <li><a href="#" class="button">Default</a></li>
                    <li><a href="#" class="button small">Small</a></li>
                </ul>
                <ul class="actions fit">
                    <li><a href="#" class="button fit">Fit</a></li>
                    <li><a href="#" class="button primary fit">Fit</a></li>
                    <li><a href="#" class="button fit">Fit</a></li>
                </ul>
                <ul class="actions fit small">
                    <li><a href="#" class="button primary fit small">Fit + Small</a></li>
                    <li><a href="#" class="button fit small">Fit + Small</a></li>
                    <li><a href="#" class="button primary fit small">Fit + Small</a></li>
                </ul>
                <ul class="actions">
                    <li><a href="#" class="button primary icon solid fa-download">Icon</a></li>
                    <li><a href="#" class="button icon solid fa-download">Icon</a></li>
                </ul>
                <ul class="actions">
                    <li><span class="button primary disabled">Disabled</span></li>
                    <li><span class="button disabled">Disabled</span></li>
                </ul>
            </section>

            <section>
                <h4>Form</h4>
                <form method="post" action="#">
                    <div class="row gtr-uniform gtr-50">
                        <div class="col-6 col-12-xsmall">
                            <input type="text" name="demo-name" id="demo-name" value="" placeholder="Name" />
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <input type="email" name="demo-email" id="demo-email" value="" placeholder="Email" />
                        </div>
                        <div class="col-12">
                            <select name="demo-category" id="demo-category">
                                <option value="">- Category -</option>
                                <option value="1">Manufacturing</option>
                                <option value="1">Shipping</option>
                                <option value="1">Administration</option>
                                <option value="1">Human Resources</option>
                            </select>
                        </div>
                        <div class="col-4 col-12-small">
                            <input type="radio" id="demo-priority-low" name="demo-priority" checked>
                            <label for="demo-priority-low">Low</label>
                        </div>
                        <div class="col-4 col-12-small">
                            <input type="radio" id="demo-priority-normal" name="demo-priority">
                            <label for="demo-priority-normal">Normal</label>
                        </div>
                        <div class="col-4 col-12-small">
                            <input type="radio" id="demo-priority-high" name="demo-priority">
                            <label for="demo-priority-high">High</label>
                        </div>
                        <div class="col-6 col-12-small">
                            <input type="checkbox" id="demo-copy" name="demo-copy">
                            <label for="demo-copy">Email me a copy</label>
                        </div>
                        <div class="col-6 col-12-small">
                            <input type="checkbox" id="demo-human" name="demo-human" checked>
                            <label for="demo-human">Not a robot</label>
                        </div>
                        <div class="col-12">
                            <textarea name="demo-message" id="demo-message" placeholder="Enter your message" rows="6"></textarea>
                        </div>
                        <div class="col-12">
                            <ul class="actions">
                                <li><input type="submit" value="Send Message" class="primary" /></li>
                                <li><input type="reset" value="Reset" /></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </section>

            <section>
                <h4>Image</h4>
                <h5>Fit</h5>
                <div class="box alt">
                    <div class="row gtr-uniform gtr-50">
                        <div class="col-12"><span class="image fit"><img src="images/pic06.jpg" alt="" /></span></div>
                        <div class="col-4"><span class="image fit"><img src="images/pic02.jpg" alt="" /></span></div>
                        <div class="col-4"><span class="image fit"><img src="images/pic03.jpg" alt="" /></span></div>
                        <div class="col-4"><span class="image fit"><img src="images/pic04.jpg" alt="" /></span></div>
                        <div class="col-4"><span class="image fit"><img src="images/pic03.jpg" alt="" /></span></div>
                        <div class="col-4"><span class="image fit"><img src="images/pic04.jpg" alt="" /></span></div>
                        <div class="col-4"><span class="image fit"><img src="images/pic02.jpg" alt="" /></span></div>
                        <div class="col-4"><span class="image fit"><img src="images/pic04.jpg" alt="" /></span></div>
                        <div class="col-4"><span class="image fit"><img src="images/pic02.jpg" alt="" /></span></div>
                        <div class="col-4"><span class="image fit"><img src="images/pic03.jpg" alt="" /></span></div>
                    </div>
                </div>
                <h5>Left &amp; Right</h5>
                <p><span class="image left"><img src="images/pic05.jpg" alt="" /></span>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent.</p>
                <p><span class="image right"><img src="images/pic05.jpg" alt="" /></span>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent.</p>
            </section>

        </div>
    </section>
-->
