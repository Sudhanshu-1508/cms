<?php require_once("./includes/functions.php");?>
<?php require_once("./includes/dbconnection.php");?>

<?php
   
    if(isset($_POST['submit'])){

    } else {
        $username= "";
        $password = "";
    }
?>


<?php include("includes/header.php"); ?>
<table id="structure">
    <tr>
        <td id="navigation">
        <a href="content.php"> Return topublic site</a><br/>
            <br/>
            <td id="page">
                <h2>Login</h2>
                 <form action="check_login.php" method="post">
                    <table>
        
                        <tr>
                            <td>Username:</td>
                            <td><input type="text" name="username" maxlength="30" value="<?php
                            echo htmlentities(($username)); ?>" /></td>
                        </tr> 
                        <tr>
                            <td>Password:</td>
                            <td><input type="password" name="password" maxlength="30" value="<?php
                            echo htmlentities(($password)); ?>" /></td>
                        </tr>
                        <tr>
                        <td colspan="2" ><input type="submit" name="submit" value="Login"/></td> 
                        </tr>
</table>
                 </form>
</td>
</tr>
</table>