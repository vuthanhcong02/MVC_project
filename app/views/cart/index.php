<?php include 'public/layouts/user/header.php'; ?>
<?php include 'public/layouts/user/navbar.php'; ?>
<?php
require_once 'helpers/PriceFormatter.php';
require_once 'app/models/user/Cart.php';
$cartModel = new Cart();
$subTotal = $cartModel->getSubTotal();

?>
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shopping Cart</p>
        </div>
    </div>
</div>
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Products</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php
                    if (!empty($_SESSION['cart'])) {
                        foreach ($carts as $item) {?>
                                <tr>
                                    <td class="align-middle"><img src="public/img/<?php echo $item['image']; ?>" alt="" style="width: 50px;"><?php echo $item['name']; ?></td>
                                    <td class="align-middle"><?php echo $item['size']; ?></td>
                                    <td class="align-middle"><?php echo $item['color']; ?></td>
                                    <td class="align-middle"><?php echo PriceFormatter::formatPrice($item['price']) ?></td>
                                    <td class="align-middle">
                                        <div class="input-group quantity mx-auto" style="width: 100px;">
                                            <!-- <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" name="decrease">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div> -->
                                            <input readonly type="text" class="form-control form-control-sm bg-secondary text-center" value="<?php echo $item['quantity'];
                                                                                                                                                ?>">
                                            <!-- <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus " name="increase">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div> -->
                                        </div>
                                    </td>
                                    <td class="align-middle"><?php echo PriceFormatter::formatPrice($item['price'] * $item['quantity']); ?></td>
                                    <td class="align-middle"><a href="index.php?controller=cart&action=del&id=<?php echo $item['productId'] ?>" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></a></td>
                                </tr>
                        <?php }}else { ?>
                            <tr>
                                <td colspan="8" class="align-middle">
                                    <h5>Cart is empty</h5>
                                </td>
                            </tr>
                        <?php } ?>
                </tbody>
            </table>
            <a href="index.php?controller=shop&action=index" class="btn btn-primary py-3 px-5 mt-3">Continue Shopping</a>
        </div>
        <div class="col-lg-4">
            <form class="mb-5" action="">
                <div class="input-group">
                    <input type="text" class="form-control p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium"><?php echo PriceFormatter::formatPrice($subTotal); ?></h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">$5</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold"><?php echo PriceFormatter::formatPrice($subTotal + 5); ?></h5>
                    </div>
                    <?php if (!empty($_SESSION['cart'] ) && isset($_SESSION['user'])) { ?>
                        <a href="index.php?controller=checkout&action=index" class="text-decoration-none"><button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button></a>
                    <?php } else {
                        echo '<a href="index.php?controller=checkout&action=index" class="text-decoration-none"><button class="btn btn-block btn-primary my-3 py-3" disabled>Proceed To Checkout</button></a>';
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'public/layouts/user/footer.php'; ?>