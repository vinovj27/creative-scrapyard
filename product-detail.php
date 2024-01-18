<?php

include 'header.php';

?>
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 100px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop Detail</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="index.php">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shop Detail</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Shop Detail Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <?php

        $product_id = $_REQUEST['id'];
        $q = "select * from products where product_id='$product_id'";
        $res = mysqli_query($conn, $q);
        $data = mysqli_fetch_array($res);
        // {
        
        ?>
        <div class="col-lg-5 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="./user/<?php echo $data['image']; ?>" alt="Image">
                    </div>
                    <!--  <div class="carousel-item">
                            <img class="w-100 h-100" src="img/product-2.jpg" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="img/product-3.jpg" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="img/product-4.jpg" alt="Image">
                        </div>
                     -->
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-7 pb-5">
            <h3 style="text-transform:capitalize;" class="font-weight-semi-bold">
                <?php echo $data['name']; ?>
            </h3>
            <div class="d-flex mb-3">
                <div class="text-primary mr-2">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star-half-alt"></small>
                    <small class="far fa-star"></small>
                </div>
                <small class="pt-1">(50 Reviews)</small>
            </div>
            <h3 class="font-weight-semi-bold mb-4">₹
                <?php echo $data['price']; ?>
            </h3>
            <p class="mb-4">
                <?php echo $data['detail']; ?>
            </p>

            <form action="cart-add.php">
                <div class="d-flex align-items-center mb-4 pt-2">
                    <input type="hidden" name="product_id" class="form-control bg-secondary text-center"
                        value="<?php echo $data['product_id']; ?>">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <!--<div class="input-group-btn">
                            <button class="btn btn-primary btn-minus" >
                            <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>-->
                        <input type="number" name="qty" class="form-control bg-secondary text-center" value="1" min=1>

                    </div>

                    <i class="fa fa-shopping-cart mr-1"></i>
                    <input class="btn btn-primary px-3" type="submit" value="Add To Cart">

                </div>
            </form>
            <div class="d-flex pt-2">
                <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                <div class="d-inline-flex">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-pinterest"></i>
                    </a>
                </div>
            </div>
        </div>



    </div>


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">

                    <?php
                    //print_r($data);
                    $category = $data['category'];
                    $q2 = "select * from products where category='$category'";
                    $res2 = mysqli_query($conn, $q2);
                    while ($product_data = mysqli_fetch_array($res2)) {
                        ?>

                        <div class="card product-item border-0">
                            <div
                                class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <a href="product-detail.php?id=<?php echo $product_data['product_id']; ?>">
                                    <img style="width:300px; height:230px;" class="img-fluid w-100"
                                        src="./user/<?php echo $product_data['image']; ?>" alt="">
                                </a>
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">
                                    <?php echo $product_data['name']; ?>
                                </h6>
                                <div class="d-flex justify-content-center">
                                    <h6>₹
                                        <?php echo $product_data['price']; ?>
                                    </h6>
                                </div>
                            </div>
                            
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="wish-add.php?product_id=<?php echo $products['product_id']; ?>"
                                    class="btn btn-sm text-dark p-0"><i class="fas fa-heart text-primary"></i>Add Wish</a>
                                <form action="cart-add.php">
                                    <input type="hidden" name="product_id" value="<?php echo $products['product_id']; ?>">
                                    <input type="hidden" name="qty" value="1" min=1>
                                    <i class="fas fa-shopping-cart text-primary mr-1"></i>
                                    <input class="btn btn-sm text-dark p-0" type="submit" value="Add Cart">
                                </form>
                            </div>
                        </div>

                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

    <?php

    include 'footer.php';

    ?>