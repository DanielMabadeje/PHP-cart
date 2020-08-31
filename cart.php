<?php 
session_start();
require_once('connect.php'); 
include('header.php'); 
include('nav.php'); ?>

 <div class="container">
	<div class="row">
	  <table class="table">
      <?php 
$items = $_SESSION['cart'];
$cartitems = explode(",", $items);
?>
<?php
$total = '';
$i=1;
 foreach ($cartitems as $key=>$id) {
	$sql = "SELECT * FROM sales WHERE id = $id";
	$res=mysqli_query($connection, $sql);
	$r = mysqli_fetch_assoc($res);
?>	  	
	<tr>
		<td><?php echo $i; ?></td>
		<td><a href="delcart.php?remove=<?php echo $key; ?>">Remove</a> <?php echo $r['title']; ?></td>
		<td>$<?php echo $r['price']; ?></td>
	</tr>
<?php 
	$total = $total + $r['price'];
	$i++; 
	} 
?>
<tr>
	<td><strong>Total Price</strong></td>
	<td><strong>$<?php echo $total; ?></strong></td>
	<td><a href="#" class="btn btn-info">Checkout</a></td>
</tr>
	  </table>
	</div>
</div>

<?php include('footer.php'); ?>