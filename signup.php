<?php

session_start();

$db = mysqli_connect ("localhost", "root", "", "login_system");

if (isset($_POST['signup-button'])) {

    session_start();

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string ($db, $_POST['email']);
    $password = mysqli_real_escape_string ($db, $_POST['password']);
    $password2 = mysqli_real_escape_string ($db, $_POST['password2']);

    if ($password == $password2) {
    
        $password = md5($password);
        $sql = "INSERT INTO user(username, email, password) VALUES('$username', '$email', '$password')";
        mysqli_query($db, $sql);
        $_SESSION ['message'] = "You are now logged in";
        $_SESSION ['username'] = $username;
        header("location:homepage.html");
    }else{
        $_SESSION['message'] = "The passwords did not match, try again."
    
        # code...

    
    # code...
    
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="style.scss">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Dosis:300,400,700" rel="stylesheet"/>

    <meta charset="8"/>
    <meta name="viewport" content="width=device-width, inital-scale=1.0"/> 

    <title>Login</title>
</head>

<body style="overflow-x: hidden; background-image: url(images/galaxy.jpg); background-attachment: fixed;">

    <form action="signup.php" method="post">

        <input type="text" name="username" placeholder="Username/Email...">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="password2" placeholder="Retype Password">
        <button type="submit" name="signup-button">Sign Up</button>
    </form>

</body>
    