<?php
// db connection
$conn= new mysqli('localhost','root','','contacts');
// check db connection
if (!$conn){
    die(mysqli_error($conn));
}
// insert data into db
if (isset($_POST['submit'])){

    $name=$_POST["name"];
    $cellphone=$_POST["cellphone"];
    $address=$_POST["address"];
    $image=$_POST["image"];

// Attempt insert query execution
$sql = "INSERT INTO `contacts`(`id`, `name`, `phone_number`, `address`, `image`) VALUES ('NULL','$name','$cellphone','$address','$image')";
if(mysqli_query($conn, $sql)){
   header('location:index.php');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
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
    <title>Contacts Form</title>
    <style type="text/css">
      body{
          color: #fff;
          background-color: burlywood ;
      }
    </style>
</head>
<body>
<div class="container my-5" >
    <form action="index.php" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter your name" autocomplete="off">
            <div class="form-text">For ex : Jhon alison.</div>
        </div>

        <div class="mb-3">
            <label for="cellphone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" name="cellphone" placeholder="Enter your mobile number" autocomplete="off">
            <div class="form-text">For ex : 01000854137.</div>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" name="address" placeholder="Enter your address" autocomplete="off">
            <div class="form-text">For ex : 102 Kazakh street , cairo , egypt.</div>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Upload Photo</label>
            <input class="img-thumbnail" type="file" name="image">
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>
</body>
</html>
