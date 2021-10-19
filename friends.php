<?php
    include_once('autoload.php');
    if(userLogin()==false){
        header('location:index.php');
    }else{
        $user_data=userLoginData('users',$_SESSION['id']);
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
    <section class="users">
        <div class="container">
            <div class="row">
                <?php
                    $all_users=all('users');
                    while($user=$all_users->fetch_object()):
                    if($user->id!=$user_data->id):
                ?>
                <div class="col-md-3">
                    <div class="friend-info">
                        <div class="card">
                            <div class="card-body">
                            <img src="media/users/<?php echo $user->photo; ?>" alt="">
                        <h3><?php echo $user->name; ?></h3>
                        <a class="btn btn-primary" href="profile.php?user_id=<?php echo $user->id; ?>">View Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
            endif;
            endwhile; 
            ?>
            </div>
        </div>
    </section>
    

<script src="assets/js/jquery-3.2.1.slim.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>