<?php
require('connection.php');
include('connection.php');
$login=false;
$showerror=false;
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql="SELECT  * FROM  users_details where username='$username' and password='$password'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
            $login=true;
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['username']=$username;
            header("location:welcomepage.php");
        }
    else{
        $login=false;
    }
    $showerror=true;
}
?>

<html>
    <head>
        <title>Digital Diary</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="bg"></div>
        <section>
            <div class="main">
                <div class="content">
                    <h2>Welcome To <span> Digital-Diary </span></h2>
                    <p>Your private space for self expression</p>
                    <p>Discover a private and secure platform to record your thoughts and emotions with Digital Diary</p>
                    <h3>Don't have an account?</h3>
                    <button onclick="window.location.href='registration.php'">Register</button>
                </div>
                <div class="login-box">
                    <div class="login-heading">
                        <h2>Login</h2>
                    </div>
                    
                    <?php

                            if($login==false AND  $showerror==true)
                            {
                                echo '<div class="login-error">
                                        <h2>Invalid Credintials</h2>
                                </div>';
                                
                            }
                        ?>
                    <form class="login" method="POST">
                        <div class="input-box">
                            <input type="text" name="username" id="username" required placeholder="Username"  >
                        </div>
                        <div class="input-box">
                            <input type="password" name="password" id="password" required placeholder="Password">
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="checkbox">
                            <label for="checkbox">Remember me?</label>
                        </div>
                        <div class="input-submit">
                            <input type="submit" value="Login">
                        </div>
                        <a href="#">Forgot Password?</a>
                    </form>
                </div>
            </div>
    </section>
    </body>
</html>