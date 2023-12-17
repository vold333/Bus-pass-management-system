<?php
include("dbconnection.php");
session_start();
include('alert.php');

if(isset($_POST['submit']))
{
$a = $_POST['name'];
$b = $_POST['phone'];
$c = $_POST['password'];

$check = "SELECT * FROM user WHERE name='$a' OR password='$b'";
$reg = mysqli_query($con,$check);
$row=mysqli_num_rows($reg);
if($row==0)
{
    $s = "INSERT INTO user(`name`, `phone`, `password`) VALUES ('$a','$b','$c')";
    if(mysqli_query($con,$s))
    {
        $_SESSION['msg'] = 'Your registration is successfully completed.';
        header("location:index.php");
    }
    else
    {
        echo "<script>alert('Connection failed. please try again.')</script>";
        header("location:register.php");
    } 
}
else{
    $_SESSION['msg'] = 'This Username or Password ID already exists';
    header("location:register.php");
}
}
else
{
    header("location:register.php");
}
?>