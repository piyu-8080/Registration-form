<?php
include_once "first.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    if(isset($_POST['submit'])) {
       
        $name = $_POST['name'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $DOB = $_POST['date'];
        $email = $_POST['email'];
        $photo = $_POST['photo'];
        $phone_number = $_POST['phone_number'];
        
        $sql_query = "UPDATE piyu_1 SET name='$name', address='$address', gender='$gender', date='$DOB', email='$email', photo='$photo',phone_number='$phone_number' WHERE id=$id";

        if (mysqli_query($conn, $sql_query)) {
            
           header("Location:http://localhost/registration/disp.php"); die;
           
        //exit();
            
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }


    }

    
    $sql_query = "SELECT * FROM piyu_1 WHERE id=$id";
    $result = mysqli_query($conn, $sql_query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $address = $row['address'];
        $gender = $row['gender'];
        $DOB = $row['date'];
        $email = $row['email'];
        $photo = $row['photo'];
        $phone_number = $row['phone_number'];
    } else {
        echo "Record not found";
    }
} else {
    echo "ID parameter is missing";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style1.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
</head>
<body>
<div class="background">
<h2 style="text-align:center">Edit Record</h2>

<form method="post">
    
     <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo $name; ?>"><br>

    <label for="address">Address:</label>
    <input type="text" name="address" value="<?php echo $address; ?>"><br>

    <label for="gender">Gender:</label>
    <input type="radio" id="male" name="gender"  value="male"<?php echo ($gender == 'male' )? 'checked':'';?> required>
    <span class="male">Male</span>
    <input type="radio" id="female" name="gender" value="female"<?php echo ($gender == 'female' )? 'checked':'';?> required>
    <span class="female">Female</span>
    <br>

    <label for="DOB">DOB:</label>
    <input type="date" name="date" id="date" value="<?php echo $DOB; ?>" required>
    <br>
     
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" value="<?php echo $email; ?>" required>
    <br>
    <label for="photo">Photo:</label>
    <input type="file" name="photo" id="photo" accept="image/*" value="<?php echo $photo; ?>" required>
    <br>

    <label for="phone_number">Phone Number:</label>
    <input type="tel" name="phone_number" pattern="[0-9]{10}" id="phone_number" value="<?php echo $phone_number; ?>" required>
    
    <br>

    <button type="submit" class="button button1" name="submit" value="Update"> Update</button>
</form>
</div>

</body>
</html>
