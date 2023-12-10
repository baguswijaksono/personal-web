<?php
include('../../dbconfig.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];

    $doc_id = $_POST['doc_id'];
    $docname = $_POST['docname'];
    $project = $_POST['project'];
    $title = $_POST['title'];
    $hypertext = $_POST['hypertext'];
    $shortdesc = $_POST['shortdesc'];

    if (password_verify($password, $third_hashed_password)) {
        $sql = "UPDATE `docs` SET `project` = ?, `docname` = ?, `title` = ?, `hypertext` = ?, `shortdesc` = ? WHERE `docs`.`id` = ?;";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssssi", $project, $docname, $title, $hypertext, $shortdesc, $doc_id);

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