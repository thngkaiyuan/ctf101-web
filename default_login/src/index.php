<?php
session_start();

if(isset($_POST['password'])) {
    if($_POST['password'] == 'i_can_manipulate_html_elements') {
        setcookie('privilege', '1');
	$_COOKIE['privilege'] = '1';
    }else {
        $_SESSION['status'] = 'wrong';
    }
}

$passed_0 = isset($_SESSION['status']);
$passed_1 = isset($_COOKIE['privilege']);
$passed_2 = $passed_1 && $_COOKIE['privilege'] == '0';
$passed_3 = $passed_2 && $_POST['action'] == 'print flag';
if($_POST['action'] == 'print flag' && $_COOKIE['privilege'] != 0) {
	$_POST['action'] = 'error';
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Login</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </head>
    <body>
	<noscript>Error: You need to enable JavaScript in order to complete this challenge.<p></noscript>

	<?php if(!$passed_1) : ?>
		<?php
                	if($passed_0) {
        	                print('There\'s a typo in the password<p>');
	                }
		?>

	        <form action="" method="post">
        	    Username:  <input type="text" name="username" value="john" disabled /><br />
	            Password:  <input type="password" name="password" id="s287fg" /><br />
        	    <input type="submit" value="Submit" />
	        </form>
		<script>var _0xc7f1=["\x73\x32\x38\x37\x66\x67","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64","\x76\x61\x6C\x75\x65","\x69\x5F\x63\x61\x6E\x5F\x6D\x61\x6E\x69\x70\x75\x6C\x61\x74\x64\x5F\x68\x74\x6D\x6C\x5F\x65\x6C\x65\x6D\x65\x6E\x74\x73","\x69\x64","\x72\x65\x6D\x6F\x76\x65\x41\x74\x74\x72\x69\x62\x75\x74\x65"];f= document[_0xc7f1[1]](_0xc7f1[0]);f[_0xc7f1[2]]= _0xc7f1[3];f[_0xc7f1[5]](_0xc7f1[4]);</script>


	<?php elseif($passed_1 && !$passed_3) : ?>
		<?php
			if(isset($_POST['action'])) {
				if($_POST['action'] == 'error') {
					print("Error: You need privilege level 0 to print the flag.<p>");
				} else {
					print('Your requested action <u>' . $_POST['action'] . '</u> was executed successfully.<p>');
				}
			}
		?>
		<form action="" method="post">
			Your privilege level: <?php print($_COOKIE['privilege']); ?><br>
			Perform action: 
			<select name="action" id="04jt32">
				<option value="do nothing">Do nothing</option>
				<option value="print flag">Print flag</option>
			</select><br>
			<input type="submit" value="Submit" />
		</form>
		<script>
			<?php
				/*
					function getCookie(name) {
						var value = "; " + document.cookie;
						var parts = value.split("; " + name + "=");
						if (parts.length == 2) return parts.pop().split(";").shift();
					}
					f=$("#04jt32");
					$("form").submit(function(){
						if(getCookie('privilege') == '0') f.val("do nothing");
					});
					f.removeAttr('id');
				*/
			?>
			var _0xb506=["\x3B\x20","\x63\x6F\x6F\x6B\x69\x65","\x3D","\x73\x70\x6C\x69\x74","\x6C\x65\x6E\x67\x74\x68","\x73\x68\x69\x66\x74","\x3B","\x70\x6F\x70","\x23\x30\x34\x6A\x74\x33\x32","\x70\x72\x69\x76\x69\x6C\x65\x67\x65","\x30","\x64\x6F\x20\x6E\x6F\x74\x68\x69\x6E\x67","\x76\x61\x6C","\x73\x75\x62\x6D\x69\x74","\x66\x6F\x72\x6D","\x69\x64","\x72\x65\x6D\x6F\x76\x65\x41\x74\x74\x72"];function getCookie(_0x2b2dx2){var _0x2b2dx3=_0xb506[0]+ document[_0xb506[1]];var _0x2b2dx4=_0x2b2dx3[_0xb506[3]](_0xb506[0]+ _0x2b2dx2+ _0xb506[2]);if(_0x2b2dx4[_0xb506[4]]== 2){return _0x2b2dx4[_0xb506[7]]()[_0xb506[3]](_0xb506[6])[_0xb506[5]]()}}f= $(_0xb506[8]);$(_0xb506[14])[_0xb506[13]](function(){if(getCookie(_0xb506[9])== _0xb506[10]){f[_0xb506[12]](_0xb506[11])}});f[_0xb506[16]](_0xb506[15]);
		</script>

	<?php elseif($passed_3) : ?>
		Congratulations!<br>
		flag{y0u_H4v3_m@5teR3d_t3h_ba5!cS}

	<?php endif; ?>
    </body>
</html>

