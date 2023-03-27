<?php require_once("./includes/session.php");?>
<?php require_once("./includes/functions.php");?>
<?php require_once("./includes/dbconnection.php");?>
<?php confirm_logged_in(); ?>
<? //error array 
    $error = array();
?>

<?
//custom validation

    if(!isset($_POST['menuName']) || empty($_POST['menuName'])){
        $error[] = 'menuName'; 
    }

    if(!empty($error)) {
        redirect_to("new_subject.php");
    }
?>
<?php
    $menuName = $_POST['menuName'];
    $position = $_POST['position'];
?>

<?php 
$query = "INSERT INTO subjects (menuName,position) VALUES ('{$menuName}', '{$position}')";

if(mysqli_query($connection, $query)){
    // subject created successfully
   redirect_to("content.php");
} else {
    echo "<p> subject creation failed </p>"; 
}
?>
        
<?php require("./includes/footer.php");?>
