<?php
// Replace with your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create 'docs' table
    $sql_docs = "CREATE TABLE docs (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        project VARCHAR(255) NOT NULL,
        docname VARCHAR(255),
        hypertext LONGTEXT,
        shortdesc VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    $conn->exec($sql_docs);
    echo "Table 'docs' created successfully<br>";

    // Create 'blogs' table
    $sql_blogs = "CREATE TABLE blogs (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        topic VARCHAR(255) NOT NULL,
        docname VARCHAR(255),
        hypertext LONGTEXT,
        shortdesc VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    $conn->exec($sql_blogs);
    echo "Table 'blogs' created successfully<br>";

    // Create 'tags' table
    $sql_tags = "CREATE TABLE tags (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        tag_name VARCHAR(100) NOT NULL
    )";

    $conn->exec($sql_tags);
    echo "Table 'tags' created successfully<br>";

    // Create junction table for docs and tags
    $sql_doc_tags = "CREATE TABLE doc_tags (
        doc_id INT(6) UNSIGNED,
        tag_id INT(6) UNSIGNED,
        FOREIGN KEY (doc_id) REFERENCES docs(id),
        FOREIGN KEY (tag_id) REFERENCES tags(id)
    )";

    $conn->exec($sql_doc_tags);
    echo "Table 'doc_tags' created successfully<br>";

    // Create junction table for blogs and tags
    $sql_blog_tags = "CREATE TABLE blog_tags (
        blog_id INT(6) UNSIGNED,
        tag_id INT(6) UNSIGNED,
        FOREIGN KEY (blog_id) REFERENCES blogs(id),
        FOREIGN KEY (tag_id) REFERENCES tags(id)
    )";

    $conn->exec($sql_blog_tags);
    echo "Table 'blog_tags' created successfully<br>";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
