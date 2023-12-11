<?php
include('../../dbconfig.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];
    if (password_verify($password, $first_hashed_password)) {
        $getTagquery = "SELECT * FROM tags";
        $getTagresult = $conn->query($getTagquery);

        $getpostquery = "SELECT *, 'docs' AS source FROM docs
        UNION
        SELECT *, 'blog' AS source FROM blogs;
        ";
        $getpostresult = $conn->query($getpostquery);
        ?>
        <form action="save.php" method="POST">
            <label for="tag_id">Choose Tag to attach</label><br>
            <select name="tag_id">
                <?php
                while ($row = $getTagresult->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['tag_name'] . "</option>";
                }
                ?>
            </select><br>

            <label for="id_post">Choose Post to being attached</label><br>
            <select name="id_post">
                <?php
                while ($row = $getpostresult->fetch_assoc()) {
                    echo "<option value='".$row['source'].$row['id']."'>". $row['source'].' '.$row['project']."</option>";
                }
                ?>
            </select><br>

            <label for="password">Enter the password again for 2FA</label><br>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" name="delete" value="Go">
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

