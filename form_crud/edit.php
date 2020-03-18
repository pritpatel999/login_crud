<?php

$connection = mysqli_connect('localhost','root','','formdb');
if(!$connection){
    die("QUERY FAILED".mysqli_error($connection));
}
if(isset($_GET['edit'])){
    $eid = $_GET['edit'];


$query = "SELECT * FROM sample WHERE id={$eid}";
$fetch_query = mysqli_query($connection,$query);

if(!$fetch_query){
    die('QUERY FAILED'.mysqli_error($connection));
}

while($row=mysqli_fetch_assoc($fetch_query)){
$username = $row['username'];
$email = $row['email'];
$password = $row['password'];
}
}

if(isset($_POST['update'])){

    $up_username = $_POST['u_username'];
    $up_email = $_POST['u_email'];
    $up_password = $_POST['u_password'];

    if(empty($up_password)){
    $password_query="SELECT password FROM sample WHERE id=$eid ";
    $pass_query = mysqli_query($connection,$password_query);
    
    if(!$pass_query){
        die('QUERY FAILED'.mysqli_error($connection));
    }

    $row=mysqli_fetch_assoc($pass_query);

    $upp_password = $row['password'];
}else{
    $upp_password = $up_password;
}

$up_query = "UPDATE sample SET username='{$up_username}', email='{$up_email}', password='{$upp_password}' WHERE id={$eid}";
    $update_query = mysqli_query($connection,$up_query);

    if(!$update_query){
        die('QUERY FAILED'.mysqli_error($connection));
    }

header("Location:login.php");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">


</head>
<body>
    
    
<div class="container center">

<form action="" method="POST">

    <h2 class="text-center">Login</h2>
    <div class="form-group">
    <label for="username">Username:</label>
    <input type="text" name="u_username" id="" class="form-control" value="<?php echo $username;?>">
    </div>
    <div class="form-group">
    <label for="">Email:</label>
    <input type="email" name="u_email" id="" class="form-control" value="<?php echo $email;?>">
    </div>
    <div class="form-group">
    <label for="password">Password:</label>
    <input type="text" name="u_password" id="" class="form-control">
    </div><br>
    <input type="submit" value="Update" name="update" class="btn btn-primary">
    <br><br><br>
</form>
</div>
   <!-- jQuery -->
   <script src="js/jquery.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>