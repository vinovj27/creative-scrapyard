<?php
 $hide_menu=true;
include 'header.php';

?>

<div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 510px;">
                            <img class="img-fluid" src="img/image1.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">20% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Creative Products</h3>
                                    <a href="products-category.php?type=creative" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 510px;">
                            <img class="img-fluid" src="img/scrap.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">20% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Scrap Yard</h3>
                                    <a href="products-category.php?type=scrap" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    


    <!-- Offer Start -->
    <div class="container-fluid offer ">
        <div class="row px-xl-5">
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <img src="img/creative.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3"></h5>
                        <h1 class="mb-4 font-weight-semi-bold">Creatives</h1>
                        <a href="products-category.php?type=creative" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                    <img src="img/scrap.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3"></h5>
                        <h1 class="mb-4 font-weight-semi-bold">Scrap Yard</h1>
                        <a href="products-category.php?type=scrap" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Creative Products</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <?php
                 $q="select * from products where type='creative' limit 4";
                 include 'db.php';
                   
                    $res=mysqli_query($conn,$q);
                    while($products=mysqli_fetch_array($res))
                    {
            ?>

            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img style="width:300px; height:300px;" class="img-fluid w-100" src="./user/<?php echo $products['image']; ?>" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3"><?php echo $products['name']; ?></h6>
                        <div class="d-flex justify-content-center">
                            <h6>₹ <?php echo $products['price']; ?></h6>
                        </div>
                    </div>
                    
                </div>
            </div>
            <?php
                    }
            ?>
        </div>
<div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Scrap Products</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
        <?php
                 $q="select * from products where type='scrap' limit 4";
               
                   
                    $res=mysqli_query($conn,$q);
                    while($products=mysqli_fetch_array($res))
                    {
            ?>

<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img style="width:300px; height:300px;" class="img-fluid w-100" src="./user/<?php echo $products['image']; ?>" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3"><?php echo $products['name']; ?></h6>
                        <div class="d-flex justify-content-center">
                            <h6>₹ <?php echo $products['price']; ?></h6>
                        </div>
                    </div>
                    
                </div>
            </div>
            <?php
                    }
            ?>
        </div>
    </div>
    <!-- Products End -->


  


   


<?php

include 'footer.php';

?>