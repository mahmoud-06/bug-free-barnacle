<?php
// db connection
$conn= new mysqli('localhost','root','','contacts');
// check db connection
if (!$conn){
    die(mysqli_error($conn));
}
// delete
if (isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="DELETE FROM `contacts` WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    if ($result){
        header('location:index.php');
    }
    else{
        die(mysqli_error($conn));
    }
}

