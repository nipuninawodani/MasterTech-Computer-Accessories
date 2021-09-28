
<?php
    session_start();
    require '../../PHP/Functions.php';
	require 'functioncart.php';
	$link = dblink();
    if(!isset($_SESSION['LogedIn'])){
        header('location: ../login.php');
    }
    $user_id=$_SESSION['UserID'];
    $user_products_query="select it.ProductID,it.Product_Name,it.Price ,it.NumInStock from cart_items ut inner join product it on it.ProductID=ut.item_id where ut.user_id='$user_id' AND status='added to cart' ";
    $user_products_result=mysqli_query($link,$user_products_query) or die(mysqli_error($link));
    $no_of_user_products= mysqli_num_rows($user_products_result);
	
	$sum=0;
    if($no_of_user_products==0){
        //echo "Add items to cart first.";
    ?>
        <script>
        window.alert("No items in the cart!!");
        </script>
    <?php
    }
?>




<! –– html code -- !>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="../css/mdb.min.css" />
    <link rel="stylesheet" href="./my.css" />

    </head>
  
    <Body>
        <div class="wrap cf">
            <h1 class="projTitle">My Shopping Cart</h1>
            <div class="heading cf">
              <h1>My Cart</h1>
              <a href="../index.php" class="continue">Continue Shopping</a>
            </div>
            <div class="cart">
          
       
				  <?php 
						
                        $user_products_result=mysqli_query($link,$user_products_query) or die(mysqli_error($link));
                        $no_of_user_products= mysqli_num_rows($user_products_result);
                        $counter=1;
                       while($row=mysqli_fetch_array($user_products_result)){
                           
                         ?>
              <ul class="cartWrap">
				  <?php if($counter%2==1){?>
						   
                <li class="items odd">
					<?php }else{?>
						<li class="items even">
					<?php } ?>
              <div class="infoWrap"> 
                  <div class="cartSection">
					   <?php  $imgresult=imgsview($row['ProductID']);  ?>
                   		<img src="../uploads/<?php echo $imgresult; ?>" alt="" class="itemImg" />
                    <p class="itemNumber">#<?php echo $row['ProductID']; ?></p>
                    <h3><?php echo $row['Product_Name']; ?></h3>
                    <p class="stockStatus"><?php echo $row['Price']; ?> &nbsp  X &nbsp  <?php echo(qunaty($row['ProductID'])) ?> </p>
                  </div>  
              
                 <?php  $subtotel=subtotalF( $row['ProductID'], $row['Price']);
				  		$sum=$sum+$subtotel; ?>
                  <div class="prodTotal cartSection"> 
                   	 <p class="prodTotal cartSection">LKR &nbsp <?php echo $subtotel; ?>.00</p>
                     </div> 
                        <div class="cartSection removeWrap">
                     <a href='removecart.php?id=<?php echo $row['ProductID'] ?>' class="remove">x</a>
                  </div>
                </div>
                </li><?php $counter++; } ?>
            
                  
             
    
            
           
              </ul>
            </div>
            
          
			
            
            <div class="subtotal cf">
              <ul>
                <li class="totalRow final"><span class="label">total</span><span class="value">LKR <?php echo $sum; ?>.00</span></li>
              
				  
               <?php	  if($no_of_user_products==0){?>
                <li class="totalRow"><button  class="btn btn-lg btn-primary" disabled>Checkout</button> <script>
        window.alert("please add items to  the cart!!");
        </script> </li>
				  <?php }else{ $_SESSION['sum']=$sum;?>
			 <li class="totalRow"><a href="../checkout&cart/cart&checkout.php" class="btn btn-lg btn-primary">Checkout</a></li>
	
<?php }?>
              </ul>
            </div>
          </div>
    </Body>


</html>

