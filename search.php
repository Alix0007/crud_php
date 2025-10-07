<?php include "auth.php"; ?>
<?php include "page_password.php"; ?>
<h2>Search Record</h2>
<form method="POST">
    <input type="text" name="name" placeholder="Enter Name">
    <input type="submit" name="search" value="Search">
</form>

<?php
if(isset($_POST['search'])){
    include "db.php";
    $name = $_POST['name'];
    $sql = "SELECT * FROM records WHERE name LIKE '%$name%'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            echo "ID: ".$row['id']." - Name: ".$row['name']." - Roll No: ".$row['rollno']."<br>";
        }
    }else{
        echo "No Records Found!";
    }
}
?>
