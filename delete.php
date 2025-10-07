<?php include "auth.php"; ?>
<?php include "page_password.php"; ?>
<h2>Delete Record</h2>
<form method="POST">
    <input type="number" name="id" placeholder="Enter Record ID" required>
    <input type="submit" name="delete" value="Delete">
</form>

<?php
if(isset($_POST['delete'])){
    include "db.php";
    $id = $_POST['id'];
    $sql = "DELETE FROM records WHERE id=$id";
    if(mysqli_query($conn, $sql)){
        echo "Record Deleted!";
    }else{
        echo "Error: " . mysqli_error($conn);
    }
}
?>
