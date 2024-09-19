<?php include 'connect.php';
//update  query logic


if(isset($_POST['update']))
{
    $name=$_POST['name'];
    $id=$_POST['id'];
    $email=$_POST['email'];
    $tel=$_POST['telephone'];
    $address=$_POST['Address'];
  


    $sql_update="Update `user2` set name='$name',email='$email',
    telephone='$tel',Address='$address'  where id=$id";


$result=mysqli_query($conn,$sql_update);
if($result)
{
    echo " Data updated Successfully";
}
else{
    echo "not updated";
}
    


}

?>


    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
 
</head>
<style>



input{
    padding:10px;
    display:block;
    margin:10px;
    width:50%;
   
}
</style>
<body>
  
<?php
if(isset($_GET['edit']))
{
    $edit=$_GET['edit'];
    
    $sql_q1=mysqli_query($conn,"select * from `user2` where id=$edit");
if(mysqli_num_rows($sql_q1)>0)
{
    while($data=mysqli_fetch_assoc($sql_q1))
    {
      $name=$data['name'];
      $email=$data['email'];
      $tel=$data['telephone'];
      $address=$data['Address'];
$id=$data['id'];

    }


}

}
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb mt-3">
    <li class="breadcrumb-item"><a href="Homepage.php">Home Page</a></li>
    <li class="breadcrumb-item"><a href="index.php">Add user</a></li>
    <li class="breadcrumb-item"><a href="display.php">View Users</a></li>
   
  
  </ol>
</nav>
<form style="margin-left:20px;" action="" method="post" autocomplete="off">
<input type="hidden" name="id" value=<?php echo $id ?>>
Name:<input    autocomplete="off" type ="text"  required  value=<?php echo $name ?>  name="name"  > 
email:<input  value=<?php echo $email ?> name="email" type ="text" placeholder="enter email" required  autocomplete="off">
telephone:<input  value=<?php echo $tel ?> name="telephone" type ="number" placeholder="enter telephone number" required  autocomplete="off">
address:<input  value=<?php echo $address ?> name="Address" type ="text" placeholder="enter address" required  autocomplete="off">
<input type="submit"   name="update"  value="Update" type="button" class="bg-primary p-3 mt-3"  style="border:10px solid white;">
</form>

</body>
</html>