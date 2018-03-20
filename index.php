<?php
include ('functions.php');

if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>

<div class="header">
    <h2>Home Page</h2>
</div>

<div class="container">
    <?php if(isset($_SESSION['success'])) : ?>
    <div class="alert alert-success">
        <h3>
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
        </h3>
    </div>
    <?php endif ?>

    <?php if(isset($_SESSION['user'])) : ?>

        <strong><?php echo $_SESSION['user']['username']; ?></strong>

    <small>
        <i style="...">(<?php echo ucfirst($_SESSION['user']['user_type']); ?></i>
        <br>
        <a href="index.php?logout='1'" style="...">logout</a>
    </small>

    <?php endif ?>
</div>

</body>
</html>