<?php
	function updateOrderAndEmtycart($Order_number,$user_id,$address,$payment_gross,$PayDate){
		$link=$link = dblink();
		//Check if transaction data exists with the same Order ID. orderTb
		$query="SELECT * FROM ordertb WHERE OrderID = '$Order_number'";
		$result=mysqli_query($link,$query) or die(mysqli_error($link));
		$no_of_row = mysqli_num_rows($result);
		
		 if($no_of_row == 0){ 	
			 $sql = "INSERT INTO ordertb(
					OrderID,
					UserID,
					Address,
					OrderDate,
          			Status
					
					
                ) VALUES (

          			'$Order_number', 
					'$user_id',
					'$address',
					'$PayDate',
					'Confirmed'
					
                )";
		
		 	if($link->query($sql)=== TRUE){
				echo "<script>alert('Ordertb added to database');</script>";
				
			}else{
				echo "Error:". $sql ."<br>";
					$link->error;
			}
		
	}
		
		////Check if transaction data exists with the same Order ID.  order product table
		$query="SELECT * FROM order_product WHERE OrderID = '$Order_number'";
		$result=mysqli_query($link,$query) or die(mysqli_error($link));
		$no_of_row = mysqli_num_rows($result);
		
		
		//update orderTb
		 if($no_of_row == 0){ 
			 
			  $user_products_query="select it.ProductID,it.Product_Name,it.Price ,it.NumInStock from cart_items ut inner join product it on it.ProductID=ut.item_id where ut.user_id='$user_id' AND status='added to cart' ";
									
			$user_products_result=mysqli_query($link,$user_products_query) or die(mysqli_error($link));	
			 
            while($row=mysqli_fetch_array($user_products_result)){
			$qty=qunaty($row['ProductID'],$user_id);
			$pid=$row['ProductID'];
			
				$query=mysqli_query($link,"select max(id) as oid from order_product");
				$result=mysqli_fetch_array($query);
				$OID=$result['oid']+1;
			 
			 
			 $sql = "INSERT INTO order_product(
					OrderID,
					ProductID,
					Qty,
					id
					
                ) VALUES (

          			'$Order_number', 
					'$pid',
					'$qty',
					'$OID'
					
                )";
			 
			 if($link->query($sql)=== TRUE){
				echo "<script>alert('Order_product Updated');</script>";
				
			}else{
				echo "Error:". $sql ."<br>";
					$link->error;
			}
		
		 
		 }}
		
		
		//updating cart items
        $confirm_query="update cart_items set status='Confirmed' where user_id=$user_id";
        $confirm_query_result=mysqli_query($link,$confirm_query) or die(mysqli_error($link));
		
	}
	
?>