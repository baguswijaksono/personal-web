<?php
include('../../dbconfig.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];
    if (password_verify($password, $first_hashed_password)) {
        ?>

        <form action="save_tag.php" method="post">
            <label for="tag_name">Tag Name:</label><br>
            <input type="text" id="tag_name" name="tag_name"><br><br>

            <label for="password">Enter the password again for 2FA</label><br>
            <input type="password" id="password" name="password"><br><br>

            <input type="submit" value="Submit">
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

