<?php


include 'header.php';

if (isset($_SESSION['user'])) {
    $data = $_SESSION['user'];
}

    $user_id = $data['user_id'];
    $q = "select * from cart where user_id='$user_id' ";
    $res = mysqli_query($conn, $q);
    //$data=mysqli_fetch_array($res);
    $data = mysqli_num_rows($res);

    if ($data == 0) {
        echo "<script>alert('No products added in cart, Please add product.');window.history.back();</script>";
    }


?>
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 100px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3"><b>Checkout</b></h1>

    </div>
</div>
<!-- Page Header End -->


<!-- Checkout Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <form action="checkout-save.php" method="post">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" name="f_name" type="text" placeholder="first name" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" name="l_name" type="text" placeholder="last name" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" name="email" type="text" placeholder="email" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No.</label>
                            <input class="form-control" name="mobile_no" type="text" placeholder="mobile no." required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <input class="form-control" name="country" type="text" placeholder="Country" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>state</label>
                            <input class="form-control" name="state" type="text" placeholder="state" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>tail</label>
                            <input class="form-control" name="tail" type="text" placeholder="tail" required>

                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" name="city" type="text" placeholder="city name" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address</label>
                            <input class="form-control" name="address" type="text" placeholder="address" required>
                        </div>
                    </div>
                </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <?php

                $totalprice = $_POST['price'];
                $user_id = $_POST['user_id'];
                //print_r($totalprice);
                

                ?>
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium">₹
                            <?php echo $totalprice; ?>
                        </h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">₹ 100</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold">₹
                            <?php echo $totalprice + 100; ?>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Payment</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="hidden" name="totalprice" value="<?php echo $totalprice + 100; ?>">

                            <input type="radio" class="custom-control-input" name="payment" value="COD" id="paypal"
                                required>
                            <label class="custom-control-label" for="paypal">COD</label>
                            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                        </div>
                    </div>

                    <input type="submit" value="Place Order"
                        class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">
                    <!-- <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>-->
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

include 'footer.php';

?>