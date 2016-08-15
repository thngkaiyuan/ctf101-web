
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="robots" content="noindex">

  <title>The Impossibly Lucky Draw</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <style type="text/css">
  .entry:not(:first-of-type)
  {
    margin-top: 10px;
  }

  .glyphicon
  {
    font-size: 12px;
  }

  .btn-wrapper {
    padding-top:20px;
  }
  </style>
  <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script src="927RHF82347HF982HF29J83FR9382347FRHG287E43FGH.js" ></script>
</head>
<body>
  <center>
    <div class="container" style="padding-top:30px">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="panel panel-info col-md-6">
          <div class="panel-heading">
            <div class="panel-title">The Impossibly Lucky Draw</div>
          </div>
          <div style="padding-top:30px" class="panel-body" >
            <div class="alert alert-warning" style="text-align: left">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<?php
	$msg = 'Here are two valid coupons for you to start off with:
            <ul>
              <li>GT2498HTFG8347YUHGTF422498JG</li>
              <li>G824989GJG8347DUHGTF4228FDJ3</li>
            </ul>';

if(isset($_POST['fields'])) {
	$codes = array_filter($_POST['fields']);
	if(count($codes) >= 5) {
		echo 'flag{w3_cre4t3_0uR_Own_1uck}';
	} else {
		echo '<strong>You need to submit five or more valid coupons in order to win this lucky draw.</strong><p><br>' . $msg;
	}
} else {
	echo $msg;
}
?>
          </div>
            <div class="alert alert-danger" id="errors" style="display: none"></div>
            <div class="control-group" id="fields">
              <div class="controls">
                <form role="form" autocomplete="off" id="coupons" method="post" action="">
                  <div class="entry input-group">
                    <input class="form-control" name="fields[]" type="text" placeholder="Coupon Code" />
                    <span class="input-group-btn">
                      <button class="btn btn-success btn-add" type="button">
                        <span class="glyphicon glyphicon-plus"></span>
                      </button>
                    </span>
                  </div>
                </form>
                <br>
                <small>Press <span class="glyphicon glyphicon-plus gs"></span> to add another coupon code :)</small>
              </div>
            </div>
            <div class="btn-wrapper">
              <input class="btn-primary" type="submit" id="submit_btn" form="coupons" onclick="validateAndSubmit()" />
            </div>
          </div>
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>
  </center>
</body>
</html>
