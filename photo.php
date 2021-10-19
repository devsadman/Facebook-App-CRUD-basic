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
    <?php
    if(isset($_POST['upload'])){
        $file_data=move($_FILES['photo'],'media/users/');
        $user_id=$_SESSION['id'];
        update("UPDATE users SET photo='$file_data' WHERE id='$user_id'");
        header('location:photo.php');
    }
    ?>
    <?php include_once "templates/menu.php"; ?>
    <section class="profile-user">
    <?php
            if($user_data->photo!=null):
        ?>
        <img src="media/users/<?php echo $user_data->photo; ?>" alt="">
        <?php
            elseif($user_data->gendar=='male'):
        ?>
        <img src="assets/img/m.jpg" alt="">
        <?php else: ?>
            <img src="assets/img/f.jpg" alt="">
        <?php endif; ?>
        <div class="card my-3">
            <div class="card-body">
               <form action="" method="post" enctype="multipart/form-data">
               <div class="form-group">
                    <input type="file" name="photo">
                    <input type="submit" name="upload" class="btn btn-success" value="Upload">
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