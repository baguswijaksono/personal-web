<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function getDocs($conn, $project)
{
    $sql = "SELECT * FROM docs WHERE project = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $project);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return $result;
}

function getAllDocs($conn)
{
    $sql = "SELECT * FROM docs";
    $result = $conn->query($sql);
    return $result;
}

function getAllTags($conn)
{
    $sql = "SELECT * FROM tags";
    $result = $conn->query($sql);
    return $result;
}

function getBlogs($conn, $project)
{
    $sql = "SELECT * FROM blogs WHERE topic = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $project);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return $result;
}

function getTags($conn, $blog_id)
{
    $sql_get_tags = "SELECT tags.tag_name
    FROM tags
    INNER JOIN blog_tags ON tags.id = blog_tags.tag_id
    WHERE blog_tags.blog_id = ?";

    $stmt = $conn->prepare($sql_get_tags);
    $stmt->bind_param('i', $blog_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

?>