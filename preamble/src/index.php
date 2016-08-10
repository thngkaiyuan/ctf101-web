<?php
session_start();

if(isset($_POST['password'])) {
    if($_POST['password'] == 'i_can_manipulate_html_elements') {
	$pass1 = 'almost there';
        setcookie('status', $pass1);
	$_COOKIE['status'] = $pass1;
    }else {
        $_SESSION['status'] = 'wrong';
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Login</title>
    </head>
    <body>
        <?php
                if(isset($_COOKIE['status'])) {
                        if($_COOKIE['status'] == 'done') {
                                print('Congratulations! flag{y0u_H4v3_m@5teR3d_t3h_ba5!cS}<p>');
                        } else {
                                print('Are you <u><i>done</i></u> yet?<p>');
                        }
                } else if(isset($_SESSION['status'])) {
                        print('There\'s a typo in the password<p>');
                }
        ?>
	<noscript>Error: You need to enable JavaScript in order to complete this challenge.<p></noscript>
        <form name="login" action="" method="post">
            Username:  <input type="text" name="username" value="admin" disabled /><br />
            Password:  <input type="password" name="password" id="s287fg" /><br />
            <input type="submit" name="submit" value="Submit" />
        </form>
    </body>
<script>var _0xc7f1=["\x73\x32\x38\x37\x66\x67","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64","\x76\x61\x6C\x75\x65","\x69\x5F\x63\x61\x6E\x5F\x6D\x61\x6E\x69\x70\x75\x6C\x61\x74\x64\x5F\x68\x74\x6D\x6C\x5F\x65\x6C\x65\x6D\x65\x6E\x74\x73","\x69\x64","\x72\x65\x6D\x6F\x76\x65\x41\x74\x74\x72\x69\x62\x75\x74\x65"];f= document[_0xc7f1[1]](_0xc7f1[0]);f[_0xc7f1[2]]= _0xc7f1[3];f[_0xc7f1[5]](_0xc7f1[4])</script>
</html>

