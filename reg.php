<?php
    include_once('autoload.php');
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
        if(isset($_POST['signup'])){
            $name=$_POST['name'];
            $email=$_POST['email'];
            $cell=$_POST['cell'];
            $uname=$_POST['uname'];
            $pass=$_POST['pass'];
            $pass_hash=passHash($pass);
            $cpass=$_POST['cpass'];
            $gendar=NULL;
            if(isset($_POST['gendar'])){
                $gendar=$_POST['gendar'];
            }
            $age=$_POST['age'];
            if(empty($name)||empty($email)||empty($cell)||empty($uname)||empty($pass)||empty($cpass)||empty($gendar)||empty($age)){

                $msg=msgShow('All Fields are Required','danger');
            } else if(mailCheck($email)==false){
                $msg=msgShow('Invalid E-mail Address','danger');
            } else if(cellCheck($cell)==false){
                $msg=msgShow('Invalid Cell Format','danger');
            } else if ($pass!=$cpass){
                $msg=msgShow('Confirm Password is not Correct','danger');
            } else if(dataCheck('users','email',$email)==false){
                $msg=msgShow('E-mail Already exists','danger');
            }else if(dataCheck('users','cell',$cell)==false){
                $msg=msgShow('Cell No Already exists','danger');
            }else if(dataCheck('users','username',$uname)==false){
                $msg=msgShow('User Name Already exists','danger');
            }
            
            else{
                create("INSERT INTO users (name,email,cell,username,password,gendar,age) values ('$name','$email','$cell','$uname','$pass_hash','$gendar','$age') ");
                $msg=msgShow('Registration Successfully Done','success');
            }
            
        }
    ?>
    <div class="container">
        <div class="row justify-content-center my-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Create an Account</h3>
                        <?php
                            if(isset($msg)){
                                echo $msg;
                            }
                        ?>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter your Name">
                            </div>
                            <div class="form-group">
                                <label for="">E-mail</label>
                                <input type="text" class="form-control" name="email" placeholder="Enter your E-mail">
                            </div>
                            <div class="form-group">
                                <label for="">Cell</label>
                                <input type="text" class="form-control" name="cell" placeholder="Enter your Cell">
                            </div>
                            <div class="form-group">
                                <label for="">User Name</label>
                                <input type="text" class="form-control" name="uname" placeholder="Enter your User Name">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="pass" placeholder="Enter your Password">
                            </div>
                            <div class="form-group">
                                <label for="">Confirm Password</label>
                                <input type="password" class="form-control" name="cpass" placeholder="Retype Password">
                            </div>
                            <div class="form-group">
                                <label for="">Gendar</label>
                                <br>
                                <input type="radio" name="gendar" value="male" id="male"><label for="male">Male</label>
                                <input type="radio" name="gendar" value="female" id="female"><label for="female">Male</label>
                            </div>
                            <div class="form-group">
                                <label for="">Age</label>
                                <input type="text" class="form-control" name="age" placeholder="Enter your Age">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="signup" class="btn btn-primary" value="Create Account">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <a href="index.php">Login Now</a>
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