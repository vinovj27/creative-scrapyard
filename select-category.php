<head>
    <meta charset="UTF-8">
    <title>Select Category</title>
    
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- START: Template CSS-->
    <link rel="stylesheet" href="dist/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/vendors/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="dist/vendors/jquery-ui/jquery-ui.theme.min.css">
   <link rel="stylesheet" href="dist/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="dist/vendors/flags-icon/css/flag-icon.min.css">

    <!-- END Template CSS-->

    <!-- START: Custom CSS-->
    <link rel="stylesheet" href="dist/css/main.css">
    <!-- END: Custom CSS-->
</head>

<main >
    <div class="container-fluid site-width">


        <!-- START: Card Data-->
        <div class="row">
            <div class="col-9 mt-9">
                <div class="card">
                    <div class="card-header">
                        <h6 style="text-align:center;"  class="card-title"><b>Select Category</b></h6>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                       
                               <?php

                                include 'db.php';
                                $q = "select * from product_cat";
                                $res = mysqli_query($conn, $q);
                                while( $data=mysqli_fetch_array($res))
                               {
                               ?>        

                             
                              <a href="add-product.php?id=<?php echo $data['cat_id'];?>">  <button  type="submit" class="btn btn-primary"><?php echo $data['cat_name'];?></button></a>
                         
                             <?php
                              }

                              ?>
                                  <!--  <form>

                                        <div class="form-group col-md-12">
                                            <label for="inputState">Choose A Category</label>
                                            <select id="inputState" class="form-control">
                                            <option >--Select Category--</option>
                                           
                                                
                                               
                                                
                                               
                                                <button type="submit" class="btn btn-primary">Sign in</button>
                                            </select>
                                        </div>

                                </div>



                                </form>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Card DATA-->
    </div>
</main>