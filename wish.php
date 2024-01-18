<?php

include 'header.php';

?>


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 100px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3"><b>WishList</b></h1>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <?php
                         if(isset($_SESSION['user']))
                         {
                            $data=$_SESSION['user'];
                            $user_id=$data['user_id'];

                            $q="select * from wish where user_id='$user_id'";
                            $res=mysqli_query($conn,$q);
                            while($wish=mysqli_fetch_array($res))
                            {
                                $product_id=$wish['product_id'];
                                $q1="select * from products where product_id='$product_id'";
                                $res1=mysqli_query($conn,$q1);
                                $product=mysqli_fetch_array($res1);
                    ?>
                    <tbody class="align-middle">
                        <tr>
                            <td class="align-middle"><img style="width:130px; height:90px;" src="./user/<?php echo $product['image'];?>" alt=""></td>
                            <td class="align-middle"><?php echo $product['name'];?></td>
                            <td class="align-middle"><a href="wish-remove.php?product_id=<?php echo $product['product_id'];?>"><button class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></a></td>
                        </tr>
                    </tbody>
                       <?php
                        }
                        }
                      ?>
                </table>
            </div>
            
        </div>
    </div>
    <!-- Cart End -->

<?php

include 'footer.php';

?>