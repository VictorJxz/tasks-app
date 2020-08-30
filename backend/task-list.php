<?php
    include('database.php');

    $query = "SELECT * FROM tasks";
    $result = mysqli_query($connection, $query);

    if( !$result ){
        die('Query failed.'.mysql_error($connection));
    }

    $json = array();
    while( $row = mysqli_fetch_array( $result )){
        $json[] = array(
            'name' => $row['name'],
            'description' => $row['description'],
            'id' => $row['id_tasks'],
            'created' => $row['created']
        );
    }
    $jsonstr = json_encode($json);
    echo $jsonstr;
?>