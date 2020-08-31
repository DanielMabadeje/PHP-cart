<?php 
session_start();
require_once('connect.php');
include('header.php');
include('nav.php');
?>
<?php
$sql = "SELECT * FROM sales";
$res = mysqli_query($connection, $sql);
?>

<?php while($r = mysqli_fetch_assoc($res)){ ?>
	  <div class="col-sm-6 col-md-3">
	    <div class="thumbnail">
	      <img src="<?php echo $r['picture']; ?>" alt="<?php echo $r['title'] ?> height='300px'">
	      <div class="caption">
	        <h3><?php echo $r['title'] ?></h3>
	        <p><?php echo $r['about'] ?></p>
	        <p><a href="addtocart.php?id=<?php echo $r['id']; ?>" class="btn btn-primary" role="button">Add to Cart</a></p>
	      </div>
	    </div>
	  </div>
<?php } ?>

</div>
<?php include('footer.php'); ?>