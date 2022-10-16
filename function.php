
<?php

include './dbConnection.php';




function getAll($table){
    global $conn;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($conn, $query);
    
}
    
    
 
?>
