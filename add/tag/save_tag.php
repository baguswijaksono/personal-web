<?php
include('../../dbconfig.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $password = $_POST['password'];
    if (password_verify($password, $second_hashed_password)) {

        $tag_name = $_POST['tag_name'];

        $sql = "INSERT INTO `tags` (`id`, `tag_name`) VALUES (NULL, ?);";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $tag_name);
        if (mysqli_stmt_execute($stmt)) {
            header('Location: ../../');
            exit;
        } else {
            header('Location: ../../');
            exit;
        }

    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
?>