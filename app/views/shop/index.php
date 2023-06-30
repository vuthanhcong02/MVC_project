<?php
include  'public/layouts/user/header.php'; ?>
<?php include  'public/layouts/user/navbar.php';
?>
<?php
require_once 'helpers/PriceFormatter.php';
?>
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Shop</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shop</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Shop Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-12">
            <!-- Price Start -->
            <form>
                <div class="border-bottom mb-4 pb-4">
                    <div class="d-none d-lg-block mb-4">
                        <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" href="#navbar-vertical" style="height: 40px; margin-top: -1px; padding: 0 30px;">
                            <h6 class="m-0">Filter by Category</h6>
                            <i class="fa fa-angle-down text-dark"></i>
                        </a>
                        <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                            <div class="navbar-nav w-100 overflow-hidden" style="height: 290px">
                                <a href="index.php?controller=shop&action=index" class="nav-item nav-link <?php echo $category_id ? '' : 'active'; ?>">All</a>
                                <?php foreach ($categories as $category) { ?>
                                    <a href="index.php?controller=shop&action=index&id=<?php echo $category['id'] ?>" class="nav-item nav-link <?php echo $category_id == $category['id'] ? 'active' : ''; ?>"><?php echo $category['name'] ?></a>
                                <?php } ?>
                            </div>
                        </nav>

                    </div>
                    <div class="d-none d-lg-block">
                        <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" href="#navbar-vertical" style="height: 40px; margin-top: -1px; padding: 0 30px;">
                            <h6 class="m-0">Filter by Price</h6>
                            <i class="fa fa-angle-down text-dark"></i>
                        </a>
                        <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                            <div class="navbar-nav w-100 overflow-hidden" style="height: 290px">
                            <?php if(isset($_GET['price'])){?>
                                <a href="index.php?controller=shop&action=index" class="nav-item nav-link <?php echo $_GET['price'] ? '' : 'active'; ?>">All Price</a>
                                <a href="index.php?controller=shop&action=index&price=<?php echo 'l1'; ?>" class="nav-item nav-link <?php echo $_GET['price'] == 'l1' ? 'active' : ''; ?>">$5.00 - $10.00</a>
                                <a href="index.php?controller=shop&action=index&price=<?php echo 'l2'; ?>" class="nav-item nav-link <?php echo $_GET['price'] == 'l2' ? 'active' : ''; ?>">$10.00 - $20.00</a>
                                <a href="index.php?controller=shop&action=index&price=<?php echo 'l3'; ?>" class="nav-item nav-link <?php echo $_GET['price'] == 'l3' ? 'active' : ''; ?>">$20.00 - $30.00</a>
                                <a href="index.php?controller=shop&action=index&price=<?php echo 'l4'; ?>" class="nav-item nav-link <?php echo $_GET['price'] == 'l4' ? 'active' : ''; ?>">$30.00 - $50.00</a>
                                <a href="index.php?controller=shop&action=index&price=<?php echo 'l5'; ?>" class="nav-item nav-link <?php echo $_GET['price'] == 'l5' ? 'active' : ''; ?>">$50.00 up to</a>
                                <?php }else{ ?>
                                <a href="index.php?controller=shop&action=index" class="nav-item nav-link active">All Price</a>
                                <a href="index.php?controller=shop&action=index&price=l1" class="nav-item nav-link">$5.00 - $10.00</a>
                                <a href="index.php?controller=shop&action=index&price=l2" class="nav-item nav-link">$10.00 - $20.00</a>
                                <a href="index.php?controller=shop&action=index&price=l3" class="nav-item nav-link">$20.00 - $30.00</a>
                                <a href="index.php?controller=shop&action=index&price=l4" class="nav-item nav-link">$30.00 - $50.00</a>
                                <a href="index.php?controller=shop&action=index&price=l5" class="nav-item nav-link">$50.00 up to</a>
                                <?php } ?>
                            </div>
                        </nav>

                    </div>
                </div>

            </form>

            <!-- Size End -->
        </div>
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-12">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <form action="index.php?controller=search&action=search" method="post">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search by name" name="keyword" autocomplete="off">
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text bg-transparent text-primary ">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="dropdown ml-4">
                            <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sort by
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                <a class="dropdown-item" href="#">Latest</a>
                                <a class="dropdown-item" href="#">Popularity</a>
                                <a class="dropdown-item" href="#">Best Rating</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if (!empty($products)) {
                    foreach ($products as $product) { ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="img-fluid" src="public/img/<?php echo $product['image'] ?>" style="object-fit:cover,overflow:hidden,object-position:center" width="100%">
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3"><?php echo $product['product_name'] ?></h6>
                                    <div class="d-flex justify-content-center">
                                        <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                        <h6 class="text-primary ml-1"><?php echo PriceFormatter::formatPrice($product['price']) ?></h6>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="index.php?controller=product&action=detail&id=<?php echo $product['id'] ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                    <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                                </div>
                            </div>
                        </div>
                    <?php }
                } else if (isset($products_search)) {
                    foreach ($products_search as $product) { ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="img-fluid" src="public/img/<?php echo $product['image'] ?>" style="object-fit:cover,overflow:hidden,object-position:center" width="100%">
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3"><?php echo $product['product_name'] ?></h6>
                                    <div class="d-flex justify-content-center">
                                        <h6><del>$123.00</del></h6>
                                        <h6 class="text-muted ml-2"><?php echo PriceFormatter::formatPrice($product['price']) ?></h6>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="index.php?controller=search&action=detailProductSearch&id=<?php echo $product['id'] ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                    <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <div class="col-12 pb-1">
                        <h3 class="alert alert-danger text-center mb-5 mt-5 p-5">No product found</h3>
                    </div>
                <?php }
                ?>
                <div class="col-12 pb-1">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center mb-3">
                            <?php if ($page > 1) { ?>
                            <li class="page-item">
                                <a class="page-link" href="index.php?controller=shop&action=index&page=<?php echo $page - 1 ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php for ($i = 1; $i <= $totalPage; $i++) { ?>
                                <?php if($i == $page){ ?>
                                <li class="page-item active"><a class="page-link" href="index.php?controller=shop&action=index&page=<?php echo $i ?>"><?php echo $i ?></a></li>
                                <?php } else{ ?>
                                <li class="page-item"><a class="page-link" href="index.php?controller=shop&action=index&page=<?php echo $i ?>"><?php echo $i ?></a></li>
                            <?php } }?>
                            <?php if ($page < $totalPage) { ?>
                            <li class="page-item">
                                <a class="page-link" href="index.php?controller=shop&action=index&page=<?php echo $page + 1 ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>

<?php include 'public/layouts/user/footer.php'; ?>