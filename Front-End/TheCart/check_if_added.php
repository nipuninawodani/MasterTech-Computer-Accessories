<?php
    
    function check_if_added_to_cart($Product_id){
		require '../../PHP/Functions.php';
		$link = dblink();
        $user_id=$_SESSION['UserID'];
        $product_check_query="select * from cart_items where item_id='$item_id' and user_id='$product_id' and status='Added to cart'";
        $product_check_result=mysqli_query($link,$product_check_query) or die(mysqli_error($link));
        $num_rows=mysqli_num_rows($product_check_result);
        if($num_rows>=1)return 1;
        return 0;
    }
?>
