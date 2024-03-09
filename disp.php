<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /*table{
    background: url(2.jpg) no-repeat center fixed;
    background-size: cover;*/
   body
   {
    background-color:#b9f0eb;
   } 

h2{
    text-align: center;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    text-shadow: 2px 2px 4px #000000;
}
thead{
    font-weight:bolder;
    font-size:larger;
}

.table-hover tbody tr:hover {
    background-color: hsl(258, 6%, 69%);
     /* Change background color on hover */
}
td {
   color:black;
   font-size:larger;
   text-transform: capitalize;
   border-style: outset;
}
#searchInput{
  width:250px;
  float:right;
    border: 1px solid #62bcef;
    border-radius: 25px;  
}
table{
  background-color:while;
}

 </style>
</head>
<body >

<div class="container mt-5">
  <h2>Registration Details</h2>
  <input type="text" id="searchInput" class="form-control mb-3" placeholder="Search...">
  <br>
  <div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Address</th>
          <th>Gender</th>
          <th>DOB</th>
          <th>Email</th>
          <th>Photo</th>
          <th>Phone Number</th>
          <th>Edit</th>
          
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include_once "first.php";
        $sql_query = "SELECT * FROM piyu_1"; 
        $result = mysqli_query($conn, $sql_query);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["gender"] . "</td>";
            echo "<td>" . $row["date"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo '<td><img src="' . $row["photo"] . '" alt="img" style="max-width:100px; max-height:50px;"></td>';
            echo "<td>" . $row["phone_number"] . "</td>";
            echo "<td><a href='edit.php?id=" . $row["id"] . "'> <img src='edit1.png' alt=edit width='50' height='50'></a></td>";
            echo '<td><a href="delete.php?id=' . $row["id"] . '" onclick="return confirm(\'Are you sure you want to delete?\')"><img src="delete1.png" alt="Delete" width="50" height="50"></a></td>';
            echo "</tr>";
          }
        } 
        else 
        {
          echo "<tr><td colspan='10'>No records found.</td></tr>";
        }
        mysqli_close($conn);
        ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Bootstrap JS and jQuery (Optional for some Bootstrap features) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  // JavaScript for Filtering Table Rows
  $(document).ready(function(){
    $("#searchInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("table tbody tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>
</body>
</html>
