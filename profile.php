<?php
    include_once('autoload.php');
    if(userLogin()==false){
        header('location:index.php');
    }else{
        if(isset($_GET['user_id'])){
            $user_data=userLoginData('users',$_GET['user_id']);
        } else{
            $user_data=userLoginData('users',$_SESSION['id']);
        }
        
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
        <h3 class="text-center py-3"><?php echo $user_data->name; ?></h3>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td><?php echo $user_data->name; ?></td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td>:</td>
                        <td><?php echo $user_data->email; ?>n</td>
                    </tr>
                    <tr>
                        <td>Cell</td>
                        <td>:</td>
                        <td><?php echo $user_data->cell; ?></td>
                    </tr>
                    <tr>
                        <td>Gendar</td>
                        <td>:</td>
                        <td><?php echo $user_data->gendar; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
    

<script src="assets/js/jquery-3.2.1.slim.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>