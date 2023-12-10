<?php
include('../../dbconfig.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];
    if (password_verify($password, $second_hashed_password)) {
        $blog_id = $_POST['blog_id'];
        $sql = "SELECT * FROM blogs WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $blog_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <form action="update.php" method="POST">

                <label for="topic">Topic:</label><br>
                <input type="text" id="topic" name="topic" value="<?php echo $row['topic'] ?>"><br><br>

                <label for="docname">Docname:</label><br>
                <input type="text" id="docname" name="docname" value="<?php echo $row['docname'] ?>"><br><br>

                <label for="title">Title:</label><br>
                <input type="text" id="title" name="title" value="<?php echo $row['title'] ?>"><br><br>

                <label for="hypertext">Hypertext:</label><br>
                <textarea id="hypertext" name="hypertext" rows="4" cols="50"><?php echo $row['hypertext'] ?></textarea><br><br>

                <label for="shortdesc">Short Description:</label><br>
                <textarea id="shortdesc" name="shortdesc" rows="4" cols="50"><?php echo $row['shortdesc'] ?></textarea><br><br>

                <label for="password">Enter the password again for 2FA</label><br>
                <input type="password" id="password" name="password"><br><br>

                <input name="blog_id" type="hidden" value="<?php echo $row['id'] ?>">

                <?php
        }
        ?>
            <input type="submit" value="Go">
        </form>

        <?php
    } else {
        header('Location: ../../');
        exit;
    }
} else {
    ?>
    <form action="" method="post">
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Submit">
    </form>
    <?php
}
?>