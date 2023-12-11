<?php
include('../../dbconfig.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];
    if (password_verify($password, $second_hashed_password)) {

        $result = getAboutData($conn);

        if ($result !== null && !empty($result)) {
            foreach ($result as $row) {
            ?>
            <form action="update.php" method="POST">

                <label for="name">Topic:</label><br>
                <input type="text" id="name" name="name" value="<?php echo $row['name'] ?>"><br><br>

                <label for="hypertexthome">Hypertext:</label><br>
                <textarea id="hypertexthome" name="hypertexthome" rows="4" cols="50"><?php echo $row['hypertexthome'] ?></textarea><br><br>

                <label for="hypertextabout">Short Description:</label><br>
                <textarea id="hypertextabout" name="hypertextabout" rows="4" cols="50"><?php echo $row['hypertextabout'] ?></textarea><br><br>

                <label for="password">Enter the password again for 2FA</label><br>
                <input type="password" id="password" name="password"><br><br>

                <?php
        }
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