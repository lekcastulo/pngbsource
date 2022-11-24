

    <?php


    $connection = mysqli_connect("localhost", "root", "gue55me", "pngb");
    if (mysqli_connect_errno()) {
        echo "failed to connect to mysql" . mysqli_connect_errno();
    }



    // $db_select = mysqli_select_db($connection, "script");
    // if (!$db_select) {
    //     die("Database selection failed: " . mysqli_connect_error());
    // }

  ?>