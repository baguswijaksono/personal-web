<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function getDocs($conn, $project){
    $sql = "SELECT * FROM docs WHERE project = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $project);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return $result;
}
?>