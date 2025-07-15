<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <?= $this->Html->css('admin/styles.css') ?>

    <!-- Include Quill stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.snow.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css" rel="stylesheet" />


    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <?= $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')); ?>

</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'display']) ?>">My Portfolio</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
<!--    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">-->
<!--        <div class="input-group">-->
<!--            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />-->
<!--            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>-->
<!--        </div>-->
<!--    </form>-->
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li>
                    <a class="dropdown-item d-flex justify-content-between align-items-center" href="#!">
                        Settings
                        <i class="fa-solid fa-gear"></i>
                    </a>
                </li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']) ?>">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Home</div>
                    <a class="nav-link" href="<?= $this->Url->build('/admin') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
<!--                    <div class="sb-sidenav-menu-heading">Blog</div>-->
<!--                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">-->
<!--                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>-->
<!--                        Layouts-->
<!--                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>-->
<!--                    </a>-->
<!--                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">-->
<!--                        <nav class="sb-sidenav-menu-nested nav">-->
<!--                            <a class="nav-link" href="layout-static.html">Static Navigation</a>-->
<!--                            <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>-->
<!--                        </nav>-->
<!--                    </div>-->
<!--                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">-->
<!--                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>-->
<!--                        Pages-->
<!--                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>-->
<!--                    </a>-->
<!--                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">-->
<!--                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">-->
<!--                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">-->
<!--                                Authentication-->
<!--                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>-->
<!--                            </a>-->
<!--                            <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">-->
<!--                                <nav class="sb-sidenav-menu-nested nav">-->
<!--                                    <a class="nav-link" href="login.html">Login</a>-->
<!--                                    <a class="nav-link" href="register.html">Register</a>-->
<!--                                    <a class="nav-link" href="password.html">Forgot Password</a>-->
<!--                                </nav>-->
<!--                            </div>-->
<!--                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">-->
<!--                                Error-->
<!--                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>-->
<!--                            </a>-->
<!--                            <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">-->
<!--                                <nav class="sb-sidenav-menu-nested nav">-->
<!--                                    <a class="nav-link" href="401.html">401 Page</a>-->
<!--                                    <a class="nav-link" href="404.html">404 Page</a>-->
<!--                                    <a class="nav-link" href="500.html">500 Page</a>-->
<!--                                </nav>-->
<!--                            </div>-->
<!--                        </nav>-->
<!--                    </div>-->

<!--                    Blog Posts-->
                    <div class="sb-sidenav-menu-heading">Blog</div>
                    <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Posts', 'action' => 'add']) ?>">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-pen-to-square"></i></div>
                        New Post
                    </a>
                    <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Posts', 'action' => 'index']) ?>">
                        <div class="sb-nav-link-icon"><i class="fa-regular fa-rectangle-list"></i></div>
                        All Posts
                    </a>

<!--                    Projects-->
                    <div class="sb-sidenav-menu-heading">Projects</div>
                    <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'add']) ?>">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-hammer"></i></div>
                        New Project
                    </a>
                    <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'index']) ?>">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-briefcase"></i></div>
                        All Projects
                    </a>

                    <!--                    Content Management-->
                    <div class="sb-sidenav-menu-heading">Content Management</div>
                    <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Contents', 'action' => 'index']) ?>">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                        Manage Pages
                    </a>

                    <!--                    Accounts-->
                    <div class="sb-sidenav-menu-heading">Accounts</div>
                    <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']) ?>">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                        View Users
                    </a>

                </div>
            </div>

            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Start Bootstrap
            </div>
        </nav>
        <div id="layoutSidenav_content">
            <main>
                <?= $this->fetch('content') ?>
            </main>
        </div>
    </div>


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<?= $this->Html->script('admin/scripts.js') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<?= $this->Html->script('admin/datatables-simple-demo.js') ?>

<!--for the quill rich text editor-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.js"></script>
</body>
</html>
