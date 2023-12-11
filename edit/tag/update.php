<?php
include('../../dbconfig.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];

    $tag_id = $_POST['tag_id'];
    $tag_name = $_POST['tag_name'];
    if (password_verify($password, $third_hashed_password)) {
        $sql = "UPDATE `tags` SET `tag_name` = ? WHERE `tags`.`id` = ?;";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "si", $tag_name, $tag_id);

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