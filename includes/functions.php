<?php

error_reporting(0);


require_once("dbconnection.php");

function confirm_query($resultSet) {
    if(!$resultSet) {
        die("database query failed: " . mysqli_error());
    }
}


function get_all_subjects(){
    global $connection;
    $subject_set = mysqli_query( $connection, "SELECT * FROM subjects ORDER BY position ASC");
    confirm_query($subject_set);
    return $subject_set;
}


function get_pages_for_subject($subject_id){
    global $connection;
    $page_set = mysqli_query( $connection, "SELECT * FROM pages WHERE subject_id = {$subject_id}");
    confirm_query($page_set);
    return $page_set;
}

function get_subject_by_id($subject_id) {
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM subjects ";
    $query .= "WHERE id =" . $subject_id . " ";
    $query .= "LIMIT 1";

    $result_set = mysqli_query($connection, $query);
    confirm_query($result_set);

   if ($subject = mysqli_fetch_array($result_set)){
    return $subject;
   } else {
    return NULL;
   }
}

   function get_page_by_id($page_id) {
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM pages ";
    $query .= "WHERE id =" . $page_id . " ";
    $query .= "LIMIT 1";

    $result_set = mysqli_query($connection, $query);
    confirm_query($result_set);

   if ($page = mysqli_fetch_array($result_set)){
    return $page;
   } else {
    return NULL;
   }

}

function find_selected_page() {
    global $sel_subject;
    global $sel_page;

    if(isset($_GET['subj'])){
        $sel_subject = get_subject_by_id($_GET['subj']);
        $sel_page = NULL;
    } elseif(isset($_GET['page'])){
        $sel_page = get_page_by_id($_GET['page']);
        $sel_subj = NULL;
    } else {
        $sel_subj= NULL;
        $sel_page = NULL;
    }
}

function navigation($sel_subject, $sel_page){
    echo  "<ul class = \"subjects\">";
    
   $subject_set = get_all_subjects();
    while($subject= mysqli_fetch_array($subject_set)){
        echo "<li";
        if ($subject["id"] == $sel_subject['id']){
             echo " class= \"selected\"";
            }
        echo "><a href=\"content.php?subj=" . urlencode($subject["id"]) . "\">
        {$subject["menuName"]}</a></li>";
        

        $page_set = get_pages_for_subject($subject["id"]);

        echo "<ul class=\"pages\">";
   
        while($page= mysqli_fetch_array($page_set)){
            echo "<li";
            if ($page["id"] == $sel_page['id']){
                echo " class= \"selected\"";
               }
            echo "><a href=\"content.php?page=" . urlencode($page["id"]) .
            "\">{$page["menuName"]}</a></li>";
        }
        echo "</ul>";
    }
   
   echo  "</ul>";

}

function redirect_to($location = null){
    if($location != null){
        header("Location: {$location}");
        exit;
    }
}


function public_navigation($sel_subject, $sel_page){
    echo  "<ul class = \"subjects\">";
    
   $subject_set = get_all_subjects();
    while($subject= mysqli_fetch_array($subject_set)){
        echo "<li";
        if ($subject["id"] == $sel_subject['id']){
             echo " class= \"selected\"";
            }
        echo "><a href=\"index.php?subj=" . urlencode($subject["id"]) . "\">
        {$subject["menuName"]}</a></li>";
        
            if($subject["id"] == $sel_subject['id']){
        $page_set = get_pages_for_subject($subject["id"]);

        echo "<ul class=\"pages\">";
        var_dump($sel_page);
        while($page= mysqli_fetch_array($page_set)){
            echo "<li";
            if ($page["id"] == $sel_page['id']){
                echo " class= \"selected\"";
               }
            echo "><a href=\"content.php?page=" . urlencode($page["id"]) .
            "\">{$page["menuName"]}</a></li>";
        }
        echo "</ul>";
    }
   
   echo  "</ul>";

}
}

?>