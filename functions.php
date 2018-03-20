<?php
/**
 * Created by PhpStorm.
 * User: user15
 * Date: 2018-03-20
 * Time: 09:46
 */

session_start();

$conn = mysqli_connect('localhost', 'root', 'labas', 'blog');

$username = "";
$email = "";
$errors = array();

if (isset($_POST['register_btn'])) {
    register();
}

function register () {
     global $conn, $errors, $username, $email;

     $username = escape($_POST['username']);
     $email = escape($_POST['email']);
     $password_1 = escape($_POST['password_1']);
     $password_2 = escape($_POST['password_2']);

     if (empty($username)) {
         array_push($errors, "Username is required");
     }

     if (empty($email)) {
         array_push($errors, "Email is required");
     }

     if (empty($password_1)) {
         array_push($errors, "Password is required");
     }

     if (empty($password_2)) {
         array_push($errors, "Please repeat password");
     }

     if ($password_1 != $password_2) {
         array_push($errors, "Passwords do not match");
     }

     if (count($errors) == 0) {
         $password = md5($password_1);

         if (isset($_POST['user_type'])) {
             $user_type = escape($_POST['user_type']);
             $query = "INSERT INTO users (username, email, user_type, password)
                    VALUES('$username', '$email', '$user_type', '$password')";
             mysqli_query($conn, $query);
             $_SESSION['success'] = "New user created successfully";
             header('location: home.php');
     }else{
             $query = "INSERT INTO users (username, email, user_type, password)
                    VALUES('$username', '$email', 'user', '$password')";
             mysqli_query($conn, $query);
             /*var_dump($query);
             echo '<br>';
             var_dump($conn);*/

             $logged_in_user_id = mysqli_insert_id($conn);

             $_SESSION['user'] = getUserById($logged_in_user_id);
             $_SESSION['success'] = "You are now logged in";
             header('location: index.php');
         }
     }
}


function getUserById($id) {
    global $conn;
    $query = "SELECT * FROM users WHERE id=". $id;
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
    return $user;
}


function escape($val) {
    global $conn;
    return mysqli_real_escape_string($conn, trim($val));
}


function display_error() {
    global $errors;
    if (count($errors) > 0) {
        echo '<div class="alert alert-danger">';
        foreach ($errors as $error) {
            echo $error. "<br>";
        }
        echo '</div>';
    }
}

function isLoggedIn () {
    if(isset($_SESSION['user'])) {
        return true;
    }else {
        return false;
    }
}

if (isset($_POST['login_btn'])) {
    login ();
}


function login()
{
    global $conn, $username, $errors;

    $username = escape($_POST['username']);
    $password = escape($_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }

    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);

        $query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
        $results = mysqli_query($conn, $query);

        if (mysqli_num_rows($results) == 1) {
            $logged_in_user = mysqli_fetch_assoc($results);
            if ($logged_in_user['user_type'] == 'admin') {
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success'] = "You are now logged in";
                header('location: admin/home.php');
            }else{
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success'] = "You are now logged in";
                header('location: index.php');
            }
        }else{
            array_push($errors, "Wrong username/password combination");
        }
    }
}