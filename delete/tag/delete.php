<?php
include('../../dbconfig.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $password = $_POST['password'];

    if (password_verify($password, $second_hashed_password)) {

        $tag_id = $_POST['tag_id'];
        $delete_query = "DELETE FROM tags WHERE id = '$tag_id'";
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