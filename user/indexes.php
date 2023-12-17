<?php
session_start();
include('dbconnection.php');

if(isset($_POST['submit']))
{
    $a = $_POST['name'];
    $b = $_POST['password'];
    $s = "select * from user where name='$a' and password='$b'";
    $sel = mysqli_query($con,$s);
    $rows = mysqli_num_rows($sel);  
    if($rows==1)
    {
        $data = mysqli_fetch_array($sel);
    
        $_SESSION['id'] = $data['id'];
        header("location:home.php");
        // echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";

    }
    else
    {
    echo "<script>alert('Invalid Username and password')</script>";
	echo "<script>window.location='index.php'</script>";
    }
}
?>


