<?php
include 'connect.php';

 if( isset($_POST['submit']))
   {
    $name= $_POST['name'];
    $email= $_POST['email'];
    $tel= $_POST['telephone'];
    $Add= $_POST['Address'];

    $sql_query="insert into `user2` (name,email,telephone,Address)
    values ('$name','$email','$tel','$Add')";
   $res= mysqli_query($conn,$sql_query);
   if($res)
   {
   header('location:display.php');
   }

   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form page</title>
   
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <h1 class="container-fluid p-5 bg-primary text-white text-center" style="border:20px solid white;">Add User</h1>

    <div >


   
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="Homepage.php">Home Page</a></li>
    <li class="breadcrumb-item"><a href="display.php">Update</a></li>
    <li class="breadcrumb-item"><a href="display.php">Delete</a></li>
    <li class="breadcrumb-item"><a href="display.php">view users</a></li>
  
  </ol>
</nav>

  <div  class="container mt-3">

    <form  action="" method="post" autocomplete="off">

Name:<input  autocomplete="off" type ="text" placeholder="enter name" required   name="name">
email:<input name="email" type ="text" placeholder="enter email" required  autocomplete="off">
telephone:<input  name="telephone" type ="number" placeholder="enter telephone number" required  autocomplete="off">
address:<input  name="Address" type ="text" placeholder="enter address" required  autocomplete="off">
<input type="submit"   name="submit" type="button" class="bg-primary p-3 mt-3"  style="border:10px solid white;">
    </form>

    
</div>






</body>





<style>

input{
    padding:10px;
    display:block;
    margin:10px;
    width:50%;
   
}

</style>
</html>