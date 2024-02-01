<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section id="cart-view">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-view-area">
                        <div class="cart-view-table">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
    $total=0;
	global $conn;
	$ip=getIp();
	$get_items = "select * from cart where ip_add='$ip'";
	$run_items = mysqli_query($conn,$get_items);
	
	while($p_price=mysqli_fetch_array($run_items)){
		
		$pro_id = $p_price['p_id'];
		$qty = $p_price['qty'];
		
		$pro_price="select * from products where product_id='$pro_id'"; 
		$run_pro_price = mysqli_query($conn,$pro_price);
		
			while($pp_price=mysqli_fetch_array($run_pro_price)){
					$product_price = array($pp_price['price']);
					$product_title = $pp_price['product_title'];
					$product_image = $pp_price['product_img1'];
					$single_price = $pp_price['price'];
					$qty_price = $single_price * $qty;
					$total+=$qty_price;
	?>
                                            <tr>
                                                <!-- <td><a class="remove" href="#"><fa class="fa fa-close"></fa></a></td>-->
                                                <td><input type="checkbox" class="remove" name="remove[]"
                                                        value="<?php echo $pro_id; ?>"></td>
                                                <td><a href="#"><img
                                                            src="admin_area/product_images/<?php echo $product_image; ?>"
                                                            alt="img"></a></td>
                                                <td><a class="aa-cart-title" href="#"><?php echo $product_title; ?></a>
                                                </td>
                                                <td><?php echo "$".$single_price; ?></td>
                                                <td><input class="aa-cart-quantity" type="number" size="4"
                                                        value="<?php echo $qty; ?>" name="qty<?php echo $pro_id; ?>">
                                                </td>
                                                <?php
							if(isset($_POST['update_cart'])){
								
								$get_cart = "select * from cart where ip_add='$ip' AND p_id='$pro_id'";
								$run_cat = mysqli_query($conn,$get_cart);
								
								if($carts=mysqli_fetch_array($run_cat)){
									
									$pro_id=$carts['p_id'];
									$new_qty=$_POST['qty'.$pro_id];
									$update_qty = "update cart set qty='$new_qty' where p_id='$pro_id'";
									$run_up_qty = mysqli_query($conn,$update_qty);
									
								}
								echo "<script>window.open('cart.php','_self')</script>";
							}
						?>
                                                <td><?php echo "$".$qty_price; ?></td>
                                            </tr>
                                            <?php } } ?>
                                            <tr>
                                                <td colspan="6" class="aa-cart-view-bottom">

                                                    <input style="margin-left:50px" class="aa-cart-view-btn"
                                                        type="submit" name="update_cart" value="Update Cart">
                                                    <input style="margin-left:50px" class="aa-cart-view-btn"
                                                        type="submit" name="continue" value="Continue Shopping">

                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>

                            </form>
                            <?php             
             	
			function updatecart(){
				global $conn;
				$ip=getIp();
				if(isset($_POST['update_cart'])){
					foreach($_POST['remove'] as $remove_id){
						$delete_product = "delete from cart where p_id='$remove_id' AND ip_add='$ip'";
						$run_delete = mysqli_query($conn,$delete_product);
						if($run_delete){
							echo "<script>window.open('cart.php','_self')</script>";
						}						
					}
				}
				if(isset($_POST['continue'])){
					echo "<script>window.open('index.php','_self')</script>";
				}
		
			}
			echo @$upcart = updatecart();
             ?>
                        </div>
                        <!-- Cart Total view -->
                        <div class="cart-view-total">

                            <h4>Cart Totals</h4>
                            <table class="aa-totals-table">
                                <tbody>
                                    <tr>
                                        <th>Subtotal</th>
                                        <td><?php echo "$ ".$total; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td><?php echo "$ ".$total; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="checkout.php" class="aa-cart-view-btn">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- / Cart view section -->
</body>

</html>