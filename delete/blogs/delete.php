<?php
include('../../dbconfig.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $password = $_POST['password'];

    if (password_verify($password, $second_hashed_password)) {

        $blog_id = $_POST['blog_id'];
        $delete_query = "DELETE FROM blogs WHERE id = '$blog_id'";
        $delete_result = $conn->query($delete_query);

        if ($delete_result) {
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

?>