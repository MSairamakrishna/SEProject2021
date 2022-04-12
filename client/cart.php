<?php
session_start();



$rid = $_SESSION['uid'];
if (isset($_SESSION['uid']) == '') {
	header("location: login.php ?msg=PLZ log in first");
}
/* Connecting to DB */
require_once("dbcontroller.php");
$db_handle = new DBController();
if (!empty($_GET["action"])) {
	switch ($_GET["action"]) {
		case "add":
			/* Adding products to cart*/
			if (!empty($_POST["quantity"])) {
				$productByCode = $db_handle->runQuery("SELECT * FROM product WHERE code='" . $_GET["code"] . "' ");
				$itemArray = array($productByCode[0]["code"] => array('name' => $productByCode[0]["name"], 'code' => $productByCode[0]["code"], 'quantity' => $_POST["quantity"], 'price' => $productByCode[0]["price"], 'image' => $productByCode[0]["image"]));

				if (!empty($_SESSION["cart_item"])) {
					if (in_array($productByCode[0]["code"], array_keys($_SESSION["cart_item"]))) {
						foreach ($_SESSION["cart_item"] as $k => $v) {
							if ($productByCode[0]["code"] == $k) {
								if (empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
								
							}

						}
					} else {
						$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
					}
				} else {
					$_SESSION["cart_item"] = $itemArray;
				}
			}
			break;
		case "remove":
			/* Removing products from Cart*/
			if (!empty($_SESSION["cart_item"])) {
				foreach ($_SESSION["cart_item"] as $k => $v) {
					if ($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);
					if (empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
				}
			}
			break;
		case "empty":
			/*Empty the cart*/
			unset($_SESSION["cart_item"]);
			break;
	}
}
?>
<HTML>

<?php
include("connect.php");
if(isset($_GET["action"])){
if ($_GET["action"] == 'submitAll') {
	
	echo '<script>alert("submitted All")</script> ';

	foreach ($_SESSION["cart_item"] as $k => $v) {
		// print_r($_SESSION["cart_item"][$k]);
		// echo $_SESSION["cart_item"][$k]['code'];
		// echo $_SESSION["cart_item"][$k]['quantity'];
		$current_quantity=$db_handle->runQuery(" SELECT quantity FROM product WHERE code='" . $_SESSION["cart_item"][$k]['code'] . "' "); 
		print_r($current_quantity[0]['quantity']);
		$quan_diff = intval($current_quantity[0]['quantity']) - intval($_SESSION["cart_item"][$k]['quantity']);
		echo '<script>alert'.$quan_diff.'</script> ';
		mysqli_query($conn,"UPDATE product Set quantity=$quan_diff WHERE code='" . $_SESSION["cart_item"][$k]['code']. "' ");
	}
}
};
?>

<HEAD>
	<link href="styles.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="lib/jquery.js"></script>
	<script>
		/*pop up for submitting the cart*/
		$(window).load(function () {
					$(".trigger_popup_fricc").click(function(){
					$('.hover_bkgr_fricc').show();
					});
					$('.hover_bkgr_fricc').click(function(){
						$('.hover_bkgr_fricc').hide();
					});
					$('.popupCloseButton').click(function(){
						$('.hover_bkgr_fricc').hide();
					});
		});
		
	</script>
</HEAD>

<BODY>

	<div id="wrap">
		<div id="menu">
			<ul>

				<li><a href="index.php">Home</a></li>
				<?php if (isset($_SESSION['uid']) != '') {
				/* Header menu for the UI*/

				?>
				<?php
				}
				?>
				<?php if (isset($_SESSION['uid']) != '') { ?>
					<li><a href="myprofile.php">Myprofile</a></li>
					<li><a href="inquiry.php">Inquiry</a></li>
					<li><a href="cart.php" class="active">Cart</a></li>
					<li><a href="organicfarming.php">Farming</a></li>
				<?php
				} ?>
				<li><a href="feedback.php">Feedback</a></li>
				<li><a href="contact.php">Contact</a></li>
				<?php if (isset($_SESSION['uid']) == '') {
				?>
					<li><a href="login.php">Login</a></li>
				<?php
				} else {
				?>
					<li><a href="logout.php">Logout</a></li>
				<?php
				}
				?>
			</ul>
		</div>

		<div id="top_padding"></div>

		<div id="content_top"></div>
		<div id="content_bg_repeat">

			<div class="inside">
				<div class="row-1 outdent">
					<div class="wrapper"></div>

					

					<div id="shopping-cart">
						<div class="txt-heading">Shopping Cart</div>

						<a id="btnEmpty" href="cart.php?action=empty">Empty Cart</a>
						<a href="cart.php?action=submitAll" class="trigger_popup_fricc" id="btnSubmit"  >Submit Cart</a>
						<?php
						if (isset($_SESSION["cart_item"])) {
							$total_quantity = 0;
							$total_price = 0;
						?>
							<table class="tbl-cart" cellpadding="10" cellspacing="1" id="popup">
								<tbody>
									<tr>
										<th style="text-align:center;">Name</th>
										<th style="text-align:center;">Code</th>
										<th style="text-align:center;" width="5%">Quantity</th>
										<th style="text-align:center;" width="10%">Unit Price <br>per lb</th>
										<th style="text-align:center;" width="10%">Price</th>
										<th style="text-align:center;" width="5%">Remove</th>
									</tr>
									<?php
									foreach ($_SESSION["cart_item"] as $item) {
										$item_price = $item["quantity"] * $item["price"];
									?>
										<tr>
											<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
											<td style="text-align:center;"><?php echo $item["code"]; ?></td>
											<td style="text-align:center;"><?php echo $item["quantity"]; ?></td>
											<td style="text-align:center;"><?php echo "$ " . $item["price"]; ?></td>
											<td style="text-align:center;"><?php echo "$ " . number_format($item_price, 2); ?></td>
											<td style="text-align:center;"><a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="images/icon-delete.png" alt="Remove Item" /></a></td>
										</tr>
									<?php

										$total_quantity += $item["quantity"];
										$total_price += ($item["price"] * $item["quantity"]);
									}
									?>

									<tr>
										<td colspan="2" align="right">Total:</td>
										<td align="right"><?php echo $total_quantity; ?></td>
										<td align="right" colspan="2"><strong><?php echo "$ " . number_format($total_price, 2); ?></strong></td>
										<td></td>
									</tr>
								</tbody>
							</table>
						<?php
						} else {
						?>
							<div style=color:white class="no-records">Your Cart is Empty</div>
						<?php
						}
						?>
					</div>
					<?php
					$cat_arry = array("fruit", "pesticide", "seed", "vegetable");

					foreach ($cat_arry as $eachcat) {
					?>
						<div id="product-grid">
							<div class="txt-heading"><?php echo ucwords($eachcat) ?></div>




							<?php
							/* Query to fetch products */
							$product_array = $db_handle->runQuery("SELECT * FROM product where category='$eachcat'");
							if (!empty($product_array)) {
								foreach ($product_array as $key => $value) {
							?>

									<div class="product-item">
										<form method="post" action="cart.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
											<center><div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div></center>
											
											<div class="product-tile-footer">
												<div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
												<div class="product-price"><?php echo "$" . $product_array[$key]["price"]; ?></div>
												<div class="product-quality" align="right"><?php echo "Quality: " . $product_array[$key]["quality"]; ?></div>
												<div class="product-Aquantity" align="left"><?php echo "Available: " . $product_array[$key]["quantity"]; ?></div>
												<?php  
												if($product_array[$key]['quantity'] == 0) {
													echo 'Out Of Stock';
												} 
												else{
													echo '';
												}
												?>
												<div class="cart-action" align="center" >
													<input type="number" class="product-quantity" <?php  
												if($product_array[$key]['quantity'] == 0) {
													echo 'disabled';
												} 
												else{
													echo '';
												}
												?> name="quantity" value="<?php  
												if($product_array[$key]['quantity'] == 0) {
													echo '0';
												} 
												else{
													echo '1';
												}
												?>" size="2" min="1" max="<?= $product_array[$key]['quantity'] ?>" />
													<input type="submit" value="Add to Cart" class="btnAddAction" />
												</div>
											</div>
										</form>
									</div>
							<?php
								}
							}
							?>
						</div>
					<?php
					}
					?>

					<div class="row-2">
						<div class="wrapper"></div>
					</div>
				</div>

			</div>
			<div id="content_bottom"></div>
			<div id="footer_top">
				<div class="clear"></div>
			</div>
		</div>
	</div>
</BODY>

</HTML>