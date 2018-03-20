<?php include('functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
<div class="container">
    <h1>Registration form</h1>
    <div class="row">
        <div class="col-4">
            <form method="POST" action="register.php">
                <?php echo display_error(); ?>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input name="username" type="text" class="form-control" value="<?php echo $username; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control" value="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password_1" type="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Repeat password</label>
                    <input name="password_2" type="password" class="form-control">
                </div>
                <button name="register_btn" type="submit" class="btn btn-primary">Register</button>
                <p>
                    Already a member? <a href="login.php">Sign in</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>