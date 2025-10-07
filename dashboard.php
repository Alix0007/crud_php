<?php include "auth.php"; ?>
<h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
<a href="add.php">Add Record</a> | 
<a href="edit.php">Edit Record</a> | 
<a href="delete.php">Delete Record</a> | 
<a href="search.php">Search Record</a> | 
<a href="logout.php">Logout</a>
