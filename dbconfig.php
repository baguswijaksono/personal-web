<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$first_hashed_password = '$2y$10$2lbso9yyLzBf1sy1BJKrb.AarVssogFHWqeGR.fonNHrOrlXWLLlq';
$second_hashed_password = '$2y$10$2lbso9yyLzBf1sy1BJKrb.AarVssogFHWqeGR.fonNHrOrlXWLLlq';
$third_hashed_password = '$2y$10$2lbso9yyLzBf1sy1BJKrb.AarVssogFHWqeGR.fonNHrOrlXWLLlq';
$fourth_hashed_password = '$2y$10$2lbso9yyLzBf1sy1BJKrb.AarVssogFHWqeGR.fonNHrOrlXWLLlq';

$waitTime = 5;

function getAboutData($conn) {
    $query = "SELECT * FROM about WHERE id = 1";
    $result = $conn->query($query);

    if ($result) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        $result->free(); 
        return $data;
    } else {
        return null;
    }
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

function getdocsTags($conn, $docs_id)
{
    $sql_get_tags = "SELECT tags.tag_name
    FROM tags
    INNER JOIN doc_tags ON tags.id = doc_tags.tag_id
    WHERE doc_tags.doc_id = ?";

    $stmt = $conn->prepare($sql_get_tags);
    $stmt->bind_param('i', $docs_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

function getViews($conn, $content_id, $content_type)
{
    $sql = "SELECT views_count
            FROM views
            WHERE content_type = ? AND content_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $content_type, $content_id);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['views_count'];
    } else {
        return 0; // Return 0 if no views found
    }
}

function incrementViews($conn, $content_id, $content_type)
{
    // Check if the content already exists in the views table
    $sql = "SELECT views_count
            FROM views
            WHERE content_type = ? AND content_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $content_type, $content_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Content exists, increment views_count
        $updateSql = "UPDATE views
                      SET views_count = views_count + 1
                      WHERE content_type = ? AND content_id = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param('si', $content_type, $content_id);
        $updateStmt->execute();
    } else {
        // Content doesn't exist, insert with views_count as 1
        $insertSql = "INSERT INTO views (content_type, content_id, views_count)
                      VALUES (?, ?, 1)";
        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->bind_param('si', $content_type, $content_id);
        $insertStmt->execute();
    }
}


?>