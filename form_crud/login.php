<?php

$connection = mysqli_connect('localhost','root','','formdb');
if(!$connection){
    die("QUERY FAILED".mysqli_error($connection));
}

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $query = "INSERT INTO sample (username, email, password) VALUES ('$username', '{$email}', '$password')";
    $insert_query = mysqli_query($connection,$query);

    if(!$insert_query){
        die('QIERY FAILED'.mysqli_error($connection));
    }
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

   <!-- jQuery -->
   <script src="../js/jquery.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

<style>
.center{
    /* border:1px solid black; */
    width:70rem;
}

</style>

</head>
<body>

<div class="container center">

<form action="" method="POST">

    <h2 class="text-center">Login</h2>
    <div class="form-group">
    <label for="username">Username:</label>
    <input type="text" name="username" id="" class="form-control" placeholder="username">
    </div>
    <div class="form-group">
    <label for="">Email:</label>
    <input type="email" name="email" id="" class="form-control" placeholder="abc@gmail.com">
    </div>
    <div class="form-group">
    <label for="password">Password:</label>
    <input type="text" name="password" id="" class="form-control">
    </div><br>
    <input type="submit" value="submit" name="submit" class="btn btn-primary">
    <br><br><br>
</form>


<table class="table table-bordered">
    <thead>
    <tr>
    <th class="text-center">id</th>
    <th class="text-center">username</th>
    <th class="text-center">email</th>
    <th class="text-center">password</th>
    <th class="text-center">Edit</th>
    <th class="text-center">Delete</th>
    </tr>
    </thead>
    <tbody><?php
   if(isset($_GET['delete'])){
        $did = $_GET['delete'];
    $dquery = "DELETE FROM sample where id={$did}";
    $delete_query = mysqli_query($connection,$dquery);
    header("Location:login.php");
}


$connection = mysqli_connect('localhost','root','','formdb');
if(!$connection){
    die("QUERY FAILED".mysqli_error($connection));
}
        
    $rquery = "SELECT * FROM sample";
    $read_query = mysqli_query($connection,$rquery);
    if(!$read_query){
        die('QIERY FAILED'.mysqli_error($connection));
    }
    while($row = mysqli_fetch_assoc($read_query)){
        $id = $row['id'];
        $username = $row['username'];
        $email = $row['email'];
        $password = $row['password'];
  
        echo "<tr>";
        echo "<td class='text-center'>{$id}</td>";
        echo "<td class='text-center'>{$username}</td>";
        echo "<td class='text-center'>{$email}</td>";
        echo "<td class='text-center'>{$password}</td>";
        echo "<td class='text-center'><a class='btn btn-primary btn-sm' href = 'edit.php?edit={$id}'>Edit</a></td>";
        echo "<td class='text-center'><a class='btn btn-danger' href='login.php?delete={$id}'>Delete</a></td>";
        echo "</tr>";
    }

    
 ?>
    </tbody>
    </table>



</div>

</body>
</html>
