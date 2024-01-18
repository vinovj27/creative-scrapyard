<?php

include 'header.php';

?>

<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 100px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3"><b>Order Detail</b></h1>

    </div>
</div>
<div class="container-fluid pt-5">
    <div class="row px-xl-12">
        <div class="col-lg-12 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Name Of Buyer</th>
                        <th>Total Price</th>
                        <th>Payment mode</th>
                        <th>Order status</th>
                    </tr>
                </thead>
                <?php

                if (!isset($_SESSION['user'])) {
                    echo "<script>alert('Login Please');window.location='login.php';</script>";
                } else {
                    $data = $_SESSION['user'];
                    $user_id = $data['user_id'];

                    $q="select * from orders where user_id='$user_id'";
                    $res=mysqli_query($conn,$q);  
                }
                while($data=mysqli_fetch_array($res))
                {
                    
                ?>
                <tbody class="align-middle">
                    <tr>
                        <td style="text-transform:capitalize;" class="align-middle"> <?php echo $data['first_name'];?> <?php echo $data['last_name'];?>
                            </td>
                            <td class="align-middle"> <?php echo $data['totalprice'];?>
                            </td>
                            <td class="align-middle"> <?php echo $data['payment'];?>
                            </td>
                            <td>
                            <button class=" btn-danger ">pending</button>
                </td>
                                          </tr>
                </tbody>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>
<?php

include 'footer.php';

?>