<?php
include('../../dbconfig.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $password = $_POST['password'];
    if (password_verify($password, $second_hashed_password)) {

        $id_post = $_POST['id_post'];
        $tag_id = $_POST['tag_id'];

        $type = substr($id_post, 0, 4);
        $id = substr($id_post, 4);
        

        if ($type == 'docs') {
            $sql = "INSERT INTO `doc_tags` (`doc_id`, `tag_id`) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $id, $tag_id); 
            $stmt->execute();
            $stmt->close(); 
            header('Location: ../../');
            exit;
        } elseif ($type == 'blog') {
            $sql = "INSERT INTO `blog_tags` (`blog_id`, `tag_id`) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $id, $tag_id); 
            $stmt->execute();
            $stmt->close();
            header('Location: ../../');
            exit;
        }else{
            header('Location: ../../');
            exit;
        }

    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
?>