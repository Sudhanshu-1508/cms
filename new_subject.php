
<?php require_once("./includes/functions.php");?>
<?php require_once("./includes/dbconnection.php");?>


<?php
find_selected_page();

?>
<?php
    //var_dump($sel_subject);
    var_dump($sel_page);
?>

<?php include("./includes/header.php"); ?>
            <table id="structure">
                <tr>
                    <td id="navigation">
                        <?php navigation($sel_subject, $sel_page); ?>
                       
                    </td>
                    <td id="page">
                    <h2>Add subject</h2>
                    <form action="create_subject.php" method="post">
                        <p>Subject name:
                            <input type="text" name="menuName" value = "" id= "menuName" />
                        </p>
                        <p>Position:
                            <select name="position" >
                                <?php 
                                $subject_set = get_all_subjects();
                                $subject_count = mysqli_num_rows($subject_set);

                                for($count = 1; $count <= $subject_count+1; $count++){
                                    echo "<option value=\"{$count}\">{$count}</option>";
                                }
                                 ?>
                                
                            </select>
                        </p>
                        <input type="submit" value = "Add Subject"  >
                    </form>
                    <br/>
                    <a href="content.php">Cancel</a>
                    <a href="delete_subject.php?subj=<?php echo
                    urldecode(($sel_subject['id']));?>">Delete subject</a>
                    </td>
                </tr>
            </table>
        
<?php require("./includes/footer.php");?>