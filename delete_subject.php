<?php require_once("./includes/functions.php")?>
<?php require_once("./includes/dbconnection.php")?>

<?php
    if(intval($_GET['subj']) == 0) {
        redirect_to("content.php");
    

    $id = mysqli_prepare($_GET['subj']);

    $query = "DELETE FROM subjects WHERE id = {$id} LIMIT 1";

    $result = mysqli_query($connection, $query);
    if(mysqli_affected_rows() == 1){
        redirect_to("content.php");
    } else {
        echo "<p> Subject deletion failed </p>";
        echo "<p>" . mysqli_error() . "</p>";
        echo "<a href =\"content.php\">Return to main page</a>";
    }
} else {
    redirect_to("content.php");
}

?>



<?php 
if(isset($connection)){
mysqli_close($connection);
}
?>