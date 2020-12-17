<?php include 'inc/header.php'; ?>

<?php
$header = '';
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['brand'])) {
	if ($_GET['brand'] == 'male') {
		if (isset($_GET['cat'])) {
			if ($_GET['cat'] == 'shirt') {
				$results = $pd->getMaleShirt();
				$header = "Male shirt";
			}
			else {
				$results = $pd->getMaleTshirt();
				$header = "Male T-shirt";
			}
		}
		else {
			$results = $pd->getBrandProductMales();
			$header ="Male products";
		}
	}
	elseif ($_GET['brand'] == 'female') {
		if (isset($_GET['cat'])) {
			if ($_GET['cat'] == 'shirt') {
				$results = $pd->getFemaleShirt();
				$header = "Female shirt";
			}
			else {
				$results = $pd->getFemaleTshirt();
				$header = "Female T-shirt";
			}
		}
		else {
			$results = $pd->getBrandProductFemales();
			$header = "Female products";
		}
	}
	else {
		$results = $pd->getBrandProductKids();
		$header = "Kid products";
	}
}
?>

<div class="container">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    			<h3> <?php echo $header; ?> </h3>
    		</div>
    		<div class="clear"></div>
		</div>
		<div class = "row">
			<?php 
				if ($results) {
					while ($row = $results->fetch_assoc()) {
					?>
					<div class="col-12 col-sm-3" style="padding:10px; text-align:center">
						<div class="card">
							<img class="card-img-top" src="admin/<?php echo $row['image'];?>" >
							<div class="card-body">
								<h5 class="card-title"><?php echo $row['productName']; ?></h5>
								<div class="button"><span><a href="details.php?proId=<?php echo $row['productId']; ?>" class="details">Details</a></span></div>
							</div>
						</div>
					</div>
					<?php
					}
				}
				?>
		</div>
	</div>      
</div>
<?php include 'inc/footer.php'; ?>
