<?php

    include "functions.php";

    checkLogin();

    include "database_access.php";

    //local important variables
    $id = $_GET["id"];

    //logic of page
    $conn = new mysqli($server_adress, $server_user, $server_password, $server_database_name);
    if ($conn->connect_errno) {
        echo "Connect failed: %s\n".$mysqli->connect_error;
    }

    if($result = ($conn->query("SELECT * FROM tab_podatkow WHERE ID=$id")))
    {
        $filename = "*.xls";
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        $isPrintHeader = false;
        if (! empty($result)) {
            foreach ($result as $row) {
                if (! $isPrintHeader) {
                    echo implode("\t", array_keys($row)) . "\n";
                    $isPrintHeader = true;
                }
                echo implode("\t", array_values($row)) . "\n";
            }
        }
    }else{
        header("Location: error.php");
    }

    mysqli_close($conn);
?>