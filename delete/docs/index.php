<?php
include('../../dbconfig.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];
    if (password_verify($password, $first_hashed_password)) {
        $query = "SELECT * FROM docs";
        $result = $conn->query($query);
        ?>
        <form action="delete.php" method="POST">
        <label for="doc_id">Choose Blogs to Delete</label><br>
            <select name="doc_id">
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['project'] . "</option>";
                }
                ?>
            </select>
            <br>
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