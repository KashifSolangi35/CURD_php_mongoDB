<?php 
session_start(); 
?>

<!DOCTYPE html>

<html>

<head>

<title>PHP & MongoDB - CRUD Operation </title>
  
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


</head>

<body>


<div class="container">

<h1>PHP & MongoDB - CRUD Operation Tutorials </h1>


<a href="create.php" class="btn btn-success">Add User</a>


<?php

 require 'config.php';

   if(isset($_SESSION['success'])){

      echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";

   }


?>


<table class="table table-borderd">

   <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Username</th>
      <th> Action </th>
   </tr>
   <?php
      $users = $collection->find([]);
      foreach($users as $user) {
         echo "<tr>";
         echo "<td>".$user->name."</td>";
         echo "<td>".$user->email."</td>";
         echo "<td>".$user->username."</td>";
         echo "<td>";
         echo "<button class='btn btn-primary'>";
         echo "<a href='edit.php?id=".$user->_id."' class='btn btn-primary'>Edit</a>";
         echo '</button>';
         echo "<button class='btn btn-danger'>";
         echo "<a href='delete.php?id=".$user->_id."' class='btn btn-danger'>Delete</a>";
         echo '</button>';
         echo "</td>";
         echo "</tr>";

      };

   ?>

</table>
</div>
</body>
</html>