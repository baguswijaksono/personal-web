<?php
include('../../dbconfig.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $password = $_POST['password'];

    if (password_verify($password, $second_hashed_password)) {

        $doc_id = $_POST['doc_id'];
        $delete_query = "DELETE FROM doc WHERE id = '$doc_id'";
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