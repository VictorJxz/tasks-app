
<?php

    include('database.php');

    $search = $_POST['search'];

    if( !empty( $search ) ) {

        $query = "SELECT * FROM tasks WHERE name LIKE '$search%'";
        $result = mysqli_query( $connection, $query);

        if( !result ){
            die('Query error '.mysqli_error($connection));
        }

        $json = array();
        while( $row = mysqli_fetch_array($result) ){
            $json[] = array(
                'name'=> $row['name'],
                'description'=> $row['description'],
                'id'=> $row['id_tasks'],
                'created'=> $row['created'] );
        }
        $jsonst = json_encode($json);
        echo $jsonst;
    }

?>