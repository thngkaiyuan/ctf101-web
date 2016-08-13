<title>Advanced lulz!</title>
More advanced lulz (that you might not get)!<br>
<ul>
<li><a href="home.php?file=1">Dogssssssssssssss</a>
<li><a href="home.php?file=2">Emails!</a>
<li><a href="home.php?file=3">Processing an infinite loop...</a>
</ul>
<?php
   if ( isset( $_GET['file'] ) ) {
        include( $_GET['file'] . '.php' );
   } else {
	header("Location: home.php?file=1");
   }
?>

