<?php


if ($cart > 0) {
	$cart_item->user_id = "1";
	$stmt = $cart_item->read();
	$total = 0;
	$item_count = 0;
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
		$sub_total = $price * $quantity;
		echo "<div class='cart-row'>
			    <div class='col-md-8'>
                    <div class='product-name m-b-10px'><h4>{$name}</h4></div>";
		echo $quantity > 1 ? "<div>{$quantity} items</div>" : "<div>{$quantity} item</div>";
		echo "</div>";
		echo "<div class='col-md-4'>
				<h4>$" . number_format($price, 2, '.', ',') . "</h4>
			</div>
		</div>";
		$item_count += $quantity;
		$total += $sub_total;
	}
	echo "<div class='col-md-12 text-align-center'>
		<div class='cart-row'>";
	if ($item_count > 1) {
		echo "<h4 class='m-b-10px'>Total ({$item_count} items)</h4>";
	} else {
		echo "<h4 class='m-b-10px'>Total ({$item_count} item)</h4>";
	}
	echo "<h4>$" . number_format($total, 2, '.', ',') . "</h4>
	        <a href='place_order.php' class='btn btn-lg btn-success m-b-10px'>
	        	<span class='glyphicon glyphicon-shopping-cart'></span> Place Order
	        </a>
		</div>
	</div>";
} else {
	echo "<div class='col-md-12'>
		<div class='alert alert-danger'>
			No products found in your cart!
		</div>
	</div>";
}

?>