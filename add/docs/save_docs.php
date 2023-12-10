<?php
include('../../dbconfig.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $password = $_POST['password'];
    if (password_verify($password, $second_hashed_password)) {

        $project = $_POST['project'];
        $docname = $_POST['docname'];
        $title = $_POST['title'];
        $shortdesc = $_POST['shortdesc'];
        $hypertext = $_POST['hypertext'];

        $sql = "INSERT INTO docs (project,docname,title,shortdesc, hypertext) VALUES (?, ?,?,?,?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssss", $project, $docname, $title, $shortdesc, $hypertext);
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