<?php
session_start();
$FLAG_LIM = 10;
$NUM_TO_REMOVE = 5;
$SELF_NUMBER = $FLAG_LIM - 1 + $NUM_TO_REMOVE;
$CHOICES = ['nothing1','nothing2','flag'];
if(!isset($_SESSION['ballots'])) {
	$_SESSION['balloted'] = false;
	$_SESSION['ballots'] = [];
	$_SESSION['ballots']['nothing1'] = [];
	$_SESSION['ballots']['nothing2'] = [];
	$_SESSION['ballots']['flag'] = [];
	for($i=0;$i<$FLAG_LIM + $NUM_TO_REMOVE;$i++) {
		$_SESSION['ballots']['flag'][] = $i;
	}
}

if(isset($_POST['ballot_item'])) {
	$ballot_choice = $_POST['ballot_item'];
	if(in_array($ballot_choice, $CHOICES)) {
		if(isset($_SESSION['ballot_choice'])) {
			$previous_choice = $_SESSION['ballot_choice'];
			$i = array_search($SELF_NUMBER, $_SESSION['ballots'][$previous_choice]);
			unset($_SESSION['ballots'][$previous_choice][$i]);
		}
		$_SESSION['ballots'][$ballot_choice][] = $SELF_NUMBER;
		$_SESSION['balloted'] = true;
		$_SESSION['ballot_choice'] = $ballot_choice;
	}
}

if(isset($_GET['id'])) {
	$id = $_GET['id'];
	foreach ($CHOICES as $option) {
		$index = array_search($id, $_SESSION['ballots'][$option]);
		if($index !== false) {
			unset($_SESSION['ballots'][$option][$index]);
			if($id == $SELF_NUMBER) {
				$_SESSION['balloted'] = false;
				unset($_SESSION['ballot_choice']);
			}
			break;
		}
	}
}

$nothing1_count = count($_SESSION['ballots']['nothing1']);
$nothing2_count = count($_SESSION['ballots']['nothing2']);
$flag_count = count($_SESSION['ballots']['flag']);

?>

<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>CTF101 | Flag Balloting</title>

  <link rel="stylesheet" media="screen" href="./static_files/application-6c3093d0c261b28c6a2bc3eb77bd121782f3d42378a9cb436c9a9f691b1e3760.css">
  <script src="./static_files/modernizr-8930220bcb710b239a9d4f592dd8d69ac02ed88ca245dc1a59caa99aaa6ec6ed.js"></script>
  <script src="./static_files/application-52bd4fda2a4f41539a420d75b900ec4e0295bc3975f2b509c050446ec67c7c54.js" data-turbolinks-track="true"></script>
</head>

<body>
<div class="container">

  <div class="main-body portal-site">
    <div class="nav-wrapper">
  <nav class="top-bar row" data-topbar="" role="navigation" data-options="is_hover: false">
    <ul class="title-area">
      <li class="name">
        <h1><a href="#"># CTF101</a></h1>
      </li>
      <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
      <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
    </ul>
    <section class="top-bar-section">
    </section>
  </nav>
</div>

    <div class="main-view">
      <div class="row">

  <div class="columns small-12">
    <h3 class="bold">Flag Balloting System</h3>
  </div>

    <div class="columns small-12">
  <p>
    You can edit or cancel your ballot any time you like while the ballot is open.
  </p>
</div>

<div class="columns small-12 medium-6">
  <h3 class="bold">Active Ballot</h3>
<?php if($_SESSION['balloted']): ?>
Your current choice: <strong>
<?php
if($_SESSION['ballot_choice'] == 'flag' && $flag_count <= $FLAG_LIM) echo 'flag{l_4m_t3h_cr3@t0r_Of_1uck}';
elseif($_SESSION['ballot_choice'] == 'nothing1' || $_SESSION['ballot_choice'] == 'nothing2') echo 'Nothing';
elseif($_SESSION['ballot_choice'] == 'flag') echo 'Flag';
?>
</strong>
<?php else: ?>
No active ballots.
<?php endif; ?>
</div>

<div class="columns small-12 medium-6">
  <h3 class="bold">Update Ballot</h3>
  <form id="ballot_form" novalidate="novalidate" class="simple_form edit_locker_ballot" action="index.php" accept-charset="UTF-8" method="post">
  <div class="input select required locker_ballot_location"><label class="select required" for="locker_ballot_location"><abbr title="required">*</abbr> Ballot Item (Ballots Made / Total Available)</label><select class="select required" name="ballot_item" id="locker_ballot_location">
<option value="flag">Flag (<?php echo $flag_count; ?> / <?php echo $FLAG_LIM; ?>)</option>
<option value="nothing1">Nothing (<?php echo $nothing1_count; ?> / 9999)</option>
<option value="nothing1">Nothing (<?php echo $nothing2_count; ?> / 9999)</option></select></div>

  <label>
    I understand that element of <strong><u>luck will never be on my side</u></strong> for this ballot.
  </label>

  <label>
    <input class="boolean" type="checkbox" value="1" id="ballot-agreement">
    * I agree
  </label>

  <input type="submit" name="commit" value="Submit" class="button radius success" id="ballot-form-submit-button" disabled="disabled" data-disable-with="Submitting...">
<?php if($_SESSION['balloted']): ?>
    <a action="" data-confirm="Deleting ballot. Are you sure?" class="button radius alert" rel="nofollow" data-method="get" href="?id=<?php echo $SELF_NUMBER; ?>">Delete</a>
<?php endif; ?>
</form><script>
	$("#ballot-agreement").change(function() {
		$("#ballot-form-submit-button").prop('disabled', !this.checked);
	});
</script>
</div>
  <hr>
</div>

    </div>
  </div>

  <div class="push-footer">
  </div>

  <footer>
  <div class="row footer-container">

    <div class="large-12 columns">
    </div>

    <div class="large-12 columns">
	    <a href="#">Main Site</a>
    </div>

  </div>
</footer>


</div>


</body></html>
