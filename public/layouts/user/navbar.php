<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Categories</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>

            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                <div class="navbar-nav w-100 overflow-hidden" style="height: 295px">
                    <?php foreach ($categories as $category) { ?>
                        <a href="index.php?controller=shop&action=index&id=<?php echo $category['id'] ?>" class="nav-item nav-link"><?php echo $category['name'] ?></a>
                    <?php } ?>
                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="index.php?controller=home&action=index" class="nav-item nav-link <?php echo ($_GET['controller'] == 'home' && $_GET['action'] == 'index') ? 'active' : ''; ?>">Home</a>
                        <a href="index.php?controller=shop&action=index" class="nav-item nav-link <?php echo ($_GET['controller'] == 'shop' && $_GET['action'] == 'index') ? 'active' : ''; ?>">Shop</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="index.php?controller=cart&action=index" class="dropdown-item">Shopping Cart</a>
                                <a href="index.php?controller=checkout&action=index" class="dropdown-item">Checkout</a>
                            </div>
                        </div>
                        <a href="index.php?controller=order&action=show" class="nav-item nav-link <?php if(isset($_GET['controller']) && $_GET['controller'] == 'order' && isset($_GET['action']) && $_GET['action'] == 'show') echo 'active' ?>">Ordered</a>

                        <a href="index.php?controller=contact&action=index" class="nav-item nav-link <?php if(isset($_GET['controller']) && $_GET['controller'] == 'contact' && isset($_GET['action']) && $_GET['action'] == 'index') echo 'active' ?>">Contact</a>
                    </div>

                    <div class="navbar-nav ml-auto py-0">
                    <?php if (!isset($_SESSION['user'])) { ?>
                            <a href="index.php?controller=login&action=login" class="nav-item nav-link">Login</a>
                            <a href="index.php?controller=register&action=register" class="nav-item nav-link">Register</a>
                    <?php } else{ ?>
                            <a class="nav-item nav-link">Hi,<?php echo $_SESSION['user']['username'] ?></a>
                            <a href="index.php?controller=logoutUser&action=index" class="nav-item nav-link">Logout</a>
                        <?php } ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>