<?php include ('functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>

<div class="container">
    <h1>Login</h1>
    <div class="row">
        <div class="col-4">
            <form method="POST" action="login.php">
                <?php echo display_error(); ?>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input name="username" type="text" class="form-control" value="<?php echo $username; ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control">
                </div>
                <button name="login_btn" type="submit" class="btn btn-primary">Login</button>

                <p>
                    Not yet a member? <a href="register.php">Register here</a>
                </p>



</body>
</html>