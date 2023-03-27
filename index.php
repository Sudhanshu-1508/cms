<?php require_once("./includes/functions.php");?>
<?php require_once("./includes/dbconnection.php");?>

<?php
find_selected_page();

?>

<?php include("./includes/header.php"); ?>
            <table id="structure">
                <tr>
                    <td id="navigation">
                    <?php echo public_navigation($sel_subject, $sel_page); ?>
                       
                    </td>
                    <td id="page">
                   
                    <?php
                    
                    if($sel_page) {?>
                    <h2><?php echo $sel_page['menuName'];?></h2>
                    <div class="page-content">
                        <?php echo $sel_page['content']; ?>
                    </div>
                    <?php } else{ ?>
                        <h2>Welcome to widget corp </h2>
                    <?php } ?>
                    

                    </td>
                </tr>
            </table>
        
<?php require("./includes/footer.php");?>