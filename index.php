<?php

    require ('db_config.php');
    if($con){
        if (isset($_POST['login'])){
            $email=$_POST['email'];
            $pass_word=$_POST['password'];

            // $sql="SELECT * FROM users WHERE email='$pass_word'";
            $sql="SELECT * FROM users WHERE email='$email'";
            $res=mysqli_query($con,$sql);
            $result=mysqli_fetch_all($res,MYSQLI_ASSOC);
            // print_r($result);

            $db_password = $result[0]['password'];
            if ($pass_word===$db_password){
                // echo ("Correct password");
                session_start();
                $_SESSION['id']=$result[0]['userid'];
                // echo($_SESSION['id']);
                $_SESSION['logged_in']=true;
                mysqli_free_result($res);
                header("Location:dashboard.php");

            } else {
                echo ("Wrong password");
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <form action="index.php" method="POST">
        <label for="email">Email</label>
        <input type="email" name="email">
        <label for="password">Password</label>
        <input type="password" name="password">
        <button type="submit" name="login">Log In</button>
    </form>
</body>
</html>