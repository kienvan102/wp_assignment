<?php 
include 'lib/Session.php';
Session::init();
include 'lib/Database.php';
include 'helpers/Format.php';
// include 'classes/Product2.php';
// include 'classes/Cart.php';

spl_autoload_register(function ($class) {
    include_once "classes/".$class.".php";
});
$db = new Database();
$fm = new Format();
$pd = new Product();
$ct = new Cart();
$cat = new Category();
$cmr = new Customer();

 ?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache");
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
<style>
    div.dropdown-multicol2{
      width: 30em;
    }
    div.dropdown-multicol2>div.dropdown-col{
      display:inline-block;
      width: 32%;
    }
</style>
</head>
<body>
  <div class="wrap">
    <div class="header_top">
      <div class="logo">
        <a href="index.php"><h1 style="font-size:50px;color:green;">T-Shirt Shop</h1></a>
      </div>
        <div class="header_top_right">
          <div class="search_box">
            <form>
              <input type="text" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"><input type="submit" value="SEARCH">
            </form>
          </div>
          <div class="shopping_cart">
          <div class="cart">
            <a href="#" title="View my shopping cart" rel="nofollow">
                <span class="cart_title">Cart</span>
                <span class="no_product">
                <?php 
                                $getData = $ct->checkCartItem();
                                if ($getData) {
                                    $sum = Session::get("gTotal");
                                    $qty = Session::get("qty");
                                    echo "$".number_format($sum).".00"." | Qty: ".$qty;
                                } else {
                                    echo '(Empty)';
                                }
                                
                                 ?>
                </span>
              </a>
            </div>
            </div>
            <?php 
                  if (isset($_GET['cid'])) {
                      $cmrId = Session::get("cmrId");
                      $delData = $ct->delCustomerCart();
                      $delComp = $pd->delCompareDara($cmrId);
                      Session::destroy();
                  }
                   ?>
       <div class="login">
        <?php 
$login = Session::get("cuslogin");
if ($login == false) {
    ?>
    <a href="login.php">Login</a>
<?php
} else {
        ?>
<a href="?cid=<?php Session::get('cmrId'); ?>">Logout</a>
<?php
    }
 ?>
        

       </div>
     <div class="clear"></div>
   </div>
   <div class="clear"></div>
 </div>

<div class="menu">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Home</a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">He Thong Cua Hang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Blogs</a>
        </li>

        <?php 
        $chkCart = $ct->checkCartItem();
        if ($chkCart) {
          ?>
        <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
        <li class="nav-item"><a class="nav-link" href="payment.php">Payment</a></li>
        <?php
        }
        ?>
        <?php
        $cmrId = Session::get("cmrId");
        $chkOrder = $ct->checkOrder($cmrId);
        if ($chkOrder) {
          ?>        
        <li class="nav-item"><a class="nav-link" href="orderdetails.php">Order</a></li>
        <?php
        }
        ?>

        <?php 
        $login = Session::get("cuslogin");
          if ($login == true) {
        ?>
        <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
        <?php
        }
        ?>
        
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a> </li>
        <div class="clear"></div>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Products
          </a>
          <div class="dropdown-menu dropdown-multicol2" aria-labelledby="dropdownMenuButton">
            <div class="dropdown-col">
              <a class="dropdown-item" href="products-males.php">Males</a>
              <a class="dropdown-item" href="products-males.php">Shirts</a>
              <a class="dropdown-item" href="products-males.php">T-Shirts</a>
            </div>
            <div class="dropdown-col">
              <a class="dropdown-item" href="products-females.php">Females</a>
              <a class="dropdown-item" href="products-females.php">Shirts</a>
              <a class="dropdown-item" href="products-females.php">T-Shirts</a>
            </div>
            <div class="dropdown-col">
              <a class="dropdown-item" href="products-kids.php">Kids</a>
              <a class="dropdown-item" href="products-kids.php">Sweatshirts</a>
              <a class="dropdown-item" href="products-kids.php">T-Shirts</a>
            </div>
        </li>

      </ul>
    </div>
  </nav>
</div>