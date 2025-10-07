<?php include "auth.php"; ?>
<h2>Add Record</h2>
<form method="POST">
    <input type="text" name="name" placeholder="Enter Name" required><br><br>
    <input type="text" name="rollno" placeholder="Enter Roll No" required><br><br>
    <input type="submit" name="add" value="Add">
</form>

<?php
if(isset($_POST['add'])){
    include "db.php";
    $name = $_POST['name'];
    $rollno = $_POST['rollno'];
    $sql = "INSERT INTO records(name, rollno) VALUES('$name','$rollno')";
    if(mysqli_query($conn, $sql)){
        echo "Record Added!";
    }else{
        echo "Error: " . mysqli_error($conn);
    }
}
?>
