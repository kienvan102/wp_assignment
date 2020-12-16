<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>


 <div class="container">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
			<h3> <a href="products-males.php" style="text-decoration: none">Male Products </a>
			<!-- <span class="more"> <a href="products-males.php" style="text-decoration: none;">More	</a></span> -->
			</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
              $getFpd = $pd->getBrandProductMales();
              if ($getFpd) {
                  while ($result = $getFpd->fetch_assoc()) {
                      ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proId=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['productName']; ?></h2>
					 <p><span class="price"><?php echo $result['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?proId=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>
				<?php
				  }
			  } ?>
			  <br>
			  <a class='more' href="products-males.php"> More >> </a>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3> <a href="products-females.php" style="text-decoration: none"> Female Products </a> </h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php 
              $getNpd = $pd->getBrandProductFemales();
              if ($getNpd) {
                  while ($result = $getNpd->fetch_assoc()) {
                      ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proId=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['productName']; ?></h2>
					 <p><span class="price"><?php echo $result['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?proId=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>
				
				<?php
                  }
              } ?>
				<br>
				<a class='more' href="products-males.php"> More >> </a>
			</div>
    </div>
 </div>

<?php include 'inc/footer.php'; ?>
