<?php
$servername="localhost";
$username="root";
$password="";
$database_name="database123";

$conn=mysqli_connect($servername,$username,$password,$database_name);
if(!$conn)
{
    die("Connection Failed:" . mysqli_connect_error());
}

if(isset($_POST['save']))
{

$name = $_POST['name'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$DOB = $_POST['date'];
$email = $_POST['email'];
$photo = $_POST['photo'];
$phone_number = $_POST['phone_number'];


$sql_query = "INSERT INTO piyu_1(name,address,gender,date,email,photo,phone_number) VALUES ('$name','$address','$gender','$DOB','$email','$photo','$phone_number')";

if (mysqli_query($conn, $sql_query)) 
{
    
    
   header("Location:http://localhost/registration/disp.php"); die;  
        //exit();
        
} 
else
{
   echo "Error: " . $sql . "" . mysqli_error($conn);
}

}

?>
