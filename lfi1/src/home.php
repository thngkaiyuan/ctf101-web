<title>Just for lulz</title>
Just for lulz:<br>
<ul>
<li><a href="home.php?page=1">And there goes the filing cabinets...</a>
<li><a href="home.php?page=2">What's better than Steve Carell?</a>
<li><a href="home.php?page=3">Caattsssssss</a>
</ul>
<?php
   $included = true;
   if ( isset( $_GET['page'] ) ) {
        include( $_GET['page'] . '.php' );
   } else {
	header("Location: home.php?page=1");
   }
?>

