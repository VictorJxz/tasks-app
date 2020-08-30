<?php

    include('database.php');
    
    $id = $_POST['id'];
    $query = "SELECT * FROM  tasks WHERE id_tasks = $id";
    $result = mysqli_query($connection, $query);

    if(!$result){
        die('Query failed');
    }

    $json = array();
    while( $row =  mysqli_fetch_array($result) ){
        $json = array(
            'name' => $row['name'],
            'description' => $row['description'],
            'id' => $row['id_tasks'],
            'created' => $row['created']
        );
    }

    $jsonstr = json_encode($json);
    echo $jsonstr;

?>