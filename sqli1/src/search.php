<?php
   include("config.php");
   session_start();
   
   if(isset($_POST['username']) && $_POST['username']) {
      $username = $_POST['username'];
      $sql = "SELECT username, nickname FROM users WHERE username = '$username'";
   } else {
      $sql = "SELECT username, nickname FROM users";
   }
      $result = mysqli_query($db,$sql);
      $count = mysqli_num_rows($result);
      if(!$result) {
	$display = mysqli_error($db);
      } elseif($count == 0) {
	$display = "Nobody with username of '$username' found.";
      } else {

        $display = '<table class="table table-hover"><thead><th>Username</th><th>Nickname</th></thead><tbody>';
        while ($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
		$display .= "<tr><td>$row[0]</td><td>$row[1]</td></tr>";
	}
	$display .= '</tbody></table>';
      }
?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Search for user</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>

  <body>
    <script src='https://code.jquery.com/jquery-2.1.4.min.js'></script>
<div class="container">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    <div class="jumbotron">
        <h1>Search for a user</h1>
        <div class="row">
            <div class="col-md-6">
                <form action="" method="post">
                    <div class="form-group">
                        <input type="username" class="form-control" name="username" id="username" placeholder="Username">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg">Search</button>
                </form>
            </div>
        </div>
    </div>
    <div class="jumbotron">
        <h1>Results</h1>
        <div class="row">
            <div class="col-md-6">
<?php echo $display; ?>
</div></div></div>
</div>
  </body>
</html>
