<?php
// page_password.php
// Include this after auth.php on pages that require an extra page-level password.
session_start();

$page = basename($_SERVER['PHP_SELF']);
$required = 'ali007';

// initialize session container
if(!isset($_SESSION['page_pass'])){
    $_SESSION['page_pass'] = array();
}

// If already authorized for this page, continue
if(isset($_SESSION['page_pass'][$page]) && $_SESSION['page_pass'][$page] === true){
    return;
}

// If password submitted, validate
if(isset($_POST['__page_password_submit']) && isset($_POST['__page_password'])){
    if($_POST['__page_password'] === $required){
        $_SESSION['page_pass'][$page] = true;
        // redirect to self to remove POST data
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }else{
        $error = 'Incorrect page password.';
    }
}

// Show password form and stop execution
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Enter Page Password</title>
</head>
<body>
    <h2>Page Password Required</h2>
    <?php if(isset($error)) echo '<p style="color:red;">'.htmlspecialchars($error).'</p>'; ?>
    <form method="POST">
        <input type="password" name="__page_password" placeholder="Enter page password" required>
        <input type="hidden" name="__page_password_submit" value="1">
        <input type="submit" value="Submit">
    </form>
</body>
</html>
