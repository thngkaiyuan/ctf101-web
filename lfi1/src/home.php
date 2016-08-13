<title>Just for lulz</title>
Just for lulz:<br>
<ul>
<li><a href="home.php?file=cabinets">And there goes the filing cabinets...</a>
<li><a href="home.php?file=steve">What's better than Steve Carell?</a>
<li><a href="home.php?file=cats">Caattsssssss</a>
</ul>
<?php
   $included = true;
   if ( isset( $_GET['file'] ) ) {
        include( $_GET['file'] . '.php' );
   } else {
	header("Location: home.php?file=cabinets");
   }
?>

