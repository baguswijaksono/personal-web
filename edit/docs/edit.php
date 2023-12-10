<?php
include('../../dbconfig.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];
    if (password_verify($password, $second_hashed_password)) {
        $doc_id = $_POST['doc_id'];
        $sql = "SELECT * FROM docs WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $doc_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <form action="update.php" method="POST">

                <label for="project">Project:</label><br>
                <input type="text" id="project" name="project" value="<?php echo $row['project'] ?>"><br><br>

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

                <input name="doc_id" type="hidden" value="<?php echo $row['id'] ?>">

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