<?php require_once("./includes/session.php");?>
<?php require_once("./includes/functions.php");?>
<?php require_once("./includes/dbconnection.php");?>
<?php confirm_logged_in(); ?>
<? //error array 
    $error = array();
?>

<?
//custom validation

    if(!isset($_POST['username']) || empty($_POST['password'])){
        $error[] = 'username'; 
    }

    if(!empty($error)) {
        redirect_to("new_user.php");
    }
?>
<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = sha1($password);
?>

<?php 
$query = "INSERT INTO users (username,hedPassword) VALUES ('{$username}', '{$hashed_password}')";

if(mysqli_query($connection, $query)){
    // subject created successfully
   redirect_to("staff.php");
} else {
    echo "<p> subject creation failed </p>"; 
}
?>
        
<?php require("./includes/footer.php");?>
