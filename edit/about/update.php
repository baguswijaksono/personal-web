<?php
include('../../dbconfig.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];
    $name = $_POST['name'];
    $hypertexthome = $_POST['hypertexthome'];
    $hypertextabout = $_POST['hypertextabout'];

    if (password_verify($password, $third_hashed_password)) {
        $sql = "UPDATE `about` SET `hypertexthome` = ?, `name` = ?, `hypertextabout` = ? WHERE `about`.`id` = 1;";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sss", $hypertexthome, $name, $hypertextabout);

            if (mysqli_stmt_execute($stmt)) {
                header('Location: ../../');
                exit;
            } else {
                header('Location: ../../');
                exit;
            }
        } else {
            header('Location: ../../');
            exit;
        }
    } else {
        header('Location: ../../');
        exit;
    }
}
?>
