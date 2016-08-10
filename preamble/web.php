<?php
session_start();

if(isset($_POST['password'])) {
    if($_POST['password'] == 'whowouldveguessed') {
        setcookie('status', 'almost there');
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
                                print('flag{y0u_H4v3_m@5teR3d_t3h_ba5!cS}');
                        } else {
                                print('Are you done yet?');
                        }
                } else if(isset($_SESSION['status'])) {
                        print('There\'s a typo in the password');
                }
        ?>
        <form name="login" action="" method="post">
            Username:  <input type="text" name="username" value="admin" disabled /><br />
            Password:  <input type="password" name="password" value="ntosoeasy" id="s287fg" /><br />
            <input type="submit" name="submit" value="Submit" />
        </form>
    </body>
</html>

