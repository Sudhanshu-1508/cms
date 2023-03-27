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
$query = "SELECT * FROM users WHERE username= '{$username}' AND hedPassword='{$hashed_password}'";

$result_set = mysqli_query($connection, $query);

if(mysqli_affected_rows($connection) == 1) {
    $found_user = mysqli_fetch_array($result_set);
    $_SESSION['user_id'] = $found_user['id'];
    $_SESSION['username'] = $found_user['username'];


    redirect_to("staff.php");
} else{
    echo "<p>Please enter correct details</p>";
}
?>
        
<?php require("./includes/footer.php");?>
