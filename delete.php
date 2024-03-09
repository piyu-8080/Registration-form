<?php
include_once "first.php";


if(isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $sql_query = "DELETE FROM piyu_1 WHERE id = $id"; 
    if (mysqli_query($conn, $sql_query)) {
        
        header("Location:http://localhost/disp.php"); die;  
        
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "ID parameter is missing.";
}


?>

