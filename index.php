<?php
    include_once('autoload.php');
    if(userLogin()==true){
        header('location:profile.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
<?php

	/**
	 * Login Isset 
	 */
	if (isset($_POST['signin'])) {
		// get values 
		$login = $_POST['login'];
		$pass = $_POST['pass'];


		if (empty($login) || empty($pass)) {
			$msg = msgShow('All fields are requirted ');
		} else {

			$login_user_data =  authCheck('users', 'email', $login);
            //print_r($login_user_data);

			if ($login_user_data !== false) {

				if (passcheck($pass, $login_user_data->password)) {

					$_SESSION['id']	= $login_user_data->id;


					header('location:profile.php');
				} else {
					$msg = msgShow("Incorrect Password", 'warning');
				}
			} else {
				$msg = msgShow("Invalid login email address");
			}
		}
	}


	?>
    <div class="container">
        <div class="row justify-content-center my-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Login</h3>
                        <?php 
                            if(isset($msg)){
                                echo $msg;
                            }
                        ?>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">Login Info</label>
                                <input type="text" class="form-control" name="login" placeholder="Enter email or cell or username">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="pass" placeholder="Enter Password">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="signin" class="btn btn-primary" value="Sign In">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <a href="reg.php">Create an Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="assets/js/jquery-3.2.1.slim.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>