<?php
include('../../dbconfig.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];

    $blog_id = $_POST['blog_id'];
    $docname = $_POST['docname'];
    $topic = $_POST['topic'];
    $title = $_POST['title'];
    $hypertext = $_POST['hypertext'];
    $shortdesc = $_POST['shortdesc'];

    if (password_verify($password, $third_hashed_password)) {
        $sql = "UPDATE `blogs` SET `topic` = ?, `docname` = ?, `title` = ?, `hypertext` = ?, `shortdesc` = ? WHERE `blogs`.`id` = ?;";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssssi", $topic, $docname, $title, $hypertext, $shortdesc, $blog_id);

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