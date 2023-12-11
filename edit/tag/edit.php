<?php
include('../../dbconfig.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];
    if (password_verify($password, $second_hashed_password)) {
        $tag_id = $_POST['tag_id'];
        $sql = "SELECT * FROM tags WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $tag_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <form action="update.php" method="POST">

                <label for="tag_name">tag_name:</label><br>
                <input type="text" id="tag_name" name="tag_name" value="<?php echo $row['tag_name'] ?>"><br><br>

                <label for="password">Enter the password again for 2FA</label><br>
                <input type="password" id="password" name="password"><br><br>

                <input name="tag_id" type="hidden" value="<?php echo $row['id'] ?>">

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