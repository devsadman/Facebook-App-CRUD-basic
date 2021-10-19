<?php
    include_once('autoload.php');
    if(userLogin()==false){
        header('location:index.php');
    }else{
        $user_data=userLoginData('users',$_SESSION['id']);
        //echo $user_data->password;
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
    <?php include_once "templates/menu.php"; ?>
    <?php
            if(isset($_POST['updatePass'])){
                $old_pass=$_POST['oldpass'];
                $user_data->password;
                $new_pass=$_POST['npass'];
                $confirm_pass=$_POST['cpass'];
                if(empty($old_pass)||empty($new_pass)||empty($confirm_pass)){
                    $msg=msgShow('All fields are Required','danger');
                } elseif(password_verify($old_pass,$user_data->password)==false){
                    $msg=msgShow('Old Password is not Correct','danger');
                } elseif($new_pass!=$confirm_pass){
                    $msg=msgShow('Confirm Password is not Correct','danger');
                } else{
                    $hash_pass=passHash($new_pass);
                    $user_id=$_SESSION['id'];
                    update("UPDATE users SET password='$hash_pass' WHERE id='$user_id'");
                    session_destroy();
                    header('location:index.php');
                }
            }
    ?>
    <section class="profile-user">
        <?php
            if(isset($msg)){
                echo $msg;
            }
        ?>
        <div class="card my-3">
            <div class="card-body">
               <form action="" method="post">
                    <div class="form-group">
                       <input type="password" name="oldpass" placeholder="Enter Old Password" class="form-control">
                   </div>
                   <div class="form-group">
                       <input type="password" name="npass" placeholder="Enter New Password" class="form-control">
                   </div>
                   <div class="form-group">
                       <input type="password" name="cpass" placeholder="Retype New Password" class="form-control">
                   </div>
                   <div class="form-group">
                       <input type="submit" name="updatePass"  class="btn btn-info" value="Change Password">
                   </div>
               </form>
                   
               
            </div>
        </div>
    </section>
    

<script src="assets/js/jquery-3.2.1.slim.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>