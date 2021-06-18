<?php


session_start();


require 'config.php';


if (isset($_GET['id'])) {

   $user = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);

}


if(isset($_POST['submit'])){


   $collection->updateOne(

       ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],

       ['$set' => ['username' => $_POST['username'], 'email' => $_POST['email'], 'name' => $_POST['name'],]]

   );


   $_SESSION['success'] = "User updated successfully";

   header("Location: index.php");

}


?>


<!DOCTYPE html>

<html>

<head>

   <title>PHP & MongoDB - CRUD Operation Tutorials </title>

     <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


</head>

<body>


<div class="container">

   <h1>Create User</h1>

   <a href="index.php" class="btn btn-primary">Back</a>


   <form method="POST">

      <div class="form-group">

         <strong>Name:</strong>

         <input type="text" name="name" value="<?php echo $user->name; ?>" required="" class="form-control" placeholder="Name">

      </div>

      <div class="form-group">

         <strong>email:</strong>

         
         <input type="text" name="email" value="<?php echo $user->email; ?>" required="" class="form-control" placeholder="Name" />

      </div>

       <div class="form-group">

         <strong>username:</strong>

         
         <input type="text" name="username" value="<?php echo $user->username; ?>" required="" class="form-control" placeholder="username" />

      </div>


      <div class="form-group">

         <button type="submit" name="submit" class="btn btn-success">Submit</button>

      </div>

   </form>

</div>


</body>

</html>