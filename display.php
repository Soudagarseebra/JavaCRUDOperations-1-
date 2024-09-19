
<?php include 'connect.php';
 
 
 
 
 
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <link rel="stylesheet" >
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

 </head>
 <body>



    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        


      <form>


      <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" placeholder="Enter Your Name">
    <small id="emailHelp" class="form-text text-muted" ></small>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Telephone</label>
    <input type="number" class="form-control" name="telephone" id="exampleInputPassword1" placeholder="Telephone Number">
  </div>


  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <input type="text" class="form-control"  name="Address" id="exampleInputPassword1" placeholder="Address">
  </div>
  <button type="submit" class="btn btn-primary" >Save changes</button>
 
</form>


      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>





    <div class="container">
<h1 class="container-fluid p-5 bg-primary text-white text-center" style="border:20px solid white;" >Delete /Update</h1>
</div>


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="Homepage.php">Home Page</a></li>
    <li class="breadcrumb-item"><a href="index.php">Add user</a></li>
   
  
  </ol>
</nav>


    <table class="table table-striped"  style="margin-left:20px;width:130%; ">

<thead >
    <tr>
    <th class="info ">sl.no</th>
    <th  class="info ">username</th>
    <th  class="info ">email</th>
    <th  class="info ">telephone</th>
    <th  class="info ">Address</th>
    <th class="info "> Operations</th>
    </tr>
</thead>   
    <tbody>

<?php 
    $display_query=mysqli_query($conn,"select * from `user2` ");
 if(mysqli_num_rows($display_query)>0)
 {
   while($data=mysqli_fetch_assoc($display_query))
    
    {
        
    

?>

    <tr>
    <td><?php echo $data['id'] ?></td>

<td>  <?php echo $data['name'] ?></td>
<td><?php echo $data['email'] ?></td>
<td><?php echo $data['telephone'] ?></td>

<td><?php echo $data['Address'] ?></td>
<td>
<a href="delete.php?delete=<?php echo $data['id'] ?>"



onclick="return confirm('sure?');">Delete </a> <br>
<a href="update.php?edit=<?php  echo $data['id']?>" >Edit</a>
</th>


</tr>

  <?php
    }


 }

 ?>
        
</tbody>
    </table>
<style>

table,thead,tr,td,th{
    padding:10px;
    border:3px solid black;
   margin:10px 10px 10px 10px
   ;
}
table
{
    margin-left:-90px;
}
</style>



<!--   Bootstrap javascript -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


 



 </body>
 </html>