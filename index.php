<?php
// db connection
$conn= new mysqli('localhost','root','','contacts');
// check db connection
if (!$conn){
    die(mysqli_error($conn));
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <button type="button" class="btn btn-info"><a href="contacts.php"> Add User</a></button>
</div>
<br>
<br>
<div class="container">
    <table class="table table-success table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Phone_Number</th>
            <th scope="col">Address</th>
            <th scope="col">Image</th>
            <th scope="col">Operations</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql="SELECT * FROM `contacts`";
        $result=mysqli_query($conn,$sql);
        if ($result){
          while ($row=mysqli_fetch_assoc($result)){

              $id=$row["id"];
              $name=$row["name"];
              $cellphone=$row["phone_number"];
              $address=$row["address"];
              $image=$row["image"];
              echo '<tr>
            <th scope="row">'.$id.'</th>
            <td>'.$name.'</td>
            <td>'.$cellphone.'</td>
            <td>'.$address.'</td>
            <td>'.$image.'</td>
           
               <td>
            <button type="button" class="btn btn-outline-primary"><a href="update.php?updateid='.$id.'" >Update</a></button>
            <button type="button" class="btn btn-danger"><a href="delete.php?deleteid='.$id.'" >Delete</a></button>
        </td>
           
        </tr>';
          }

        }
        ?>



        </tbody>
    </table>
</div>
</body>
</html>