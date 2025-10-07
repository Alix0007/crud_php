<?php include "auth.php"; ?>
<?php include "page_password.php"; ?>
<h2>Edit Record</h2>

<form method="POST">
    <input type="number" name="id" placeholder="Enter Record ID" required>
    <input type="submit" name="search" value="Find Record">
</form>

<?php
include "db.php";
if(isset($_POST['search'])){
    $id = $_POST['id'];
    $sql = "SELECT * FROM records WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_assoc($result);
        ?>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>
            <input type="text" name="rollno" value="<?php echo $row['rollno']; ?>" required><br><br>
            <input type="submit" name="update" value="Update">
        </form>
        <?php
    }else{
        echo "Record not found!";
    }
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $rollno = $_POST['rollno'];
    $sql = "UPDATE records SET name='$name', rollno='$rollno' WHERE id=$id";
    if(mysqli_query($conn, $sql)){
        echo "Record Updated!";
    }else{
        echo "Error: " . mysqli_error($conn);
    }
}
?>
