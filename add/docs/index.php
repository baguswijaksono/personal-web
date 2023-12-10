<?php
include('../../dbconfig.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];
    if (password_verify($password, $first_hashed_password)) {
        ?>

        <form action="save_docs.php" method="post">
            <label for="project">Project:</label><br>
            <input type="text" id="project" name="project"><br><br>

            <label for="docname">Docname:</label><br>
            <input type="text" id="docname" name="docname"><br><br>

            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title"><br><br>

            <label for="hypertext">Hypertext:</label><br>
            <textarea id="hypertext" name="hypertext" rows="4" cols="50"></textarea><br><br>

            <label for="shortdesc">Short Description:</label><br>
            <textarea id="shortdesc" name="shortdesc" rows="4" cols="50"></textarea><br><br>

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