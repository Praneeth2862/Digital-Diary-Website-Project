<?php
require('connection.php');
$success=false;
$showerror=false;
if($_SERVER['REQUEST_METHOD']=='POST')
{
$username=$_POST['username'];
$email=$_POST['email'];
$birthday=$_POST['birthday'];
$squestion=$_POST['security-question'];
$sanswer=$_POST['security-answer'];
$password=$_POST['password'];

$checkquery="SELECT * FROM users_details WHERE username='$username'";
$checkresult=mysqli_query($conn,$checkquery);
if(mysqli_fetch_assoc($checkresult)==0){
    $query="INSERT INTO users_details(username,email,birthday,squestion,sanswer,password) VALUES('$username','$email','$birthday','$squestion','$sanswer','$password')";
$success=true;
$showerror=true;
$result=mysqli_query($conn,$query);
}
else{
    $showerror=true;
}
}
?>

<html>
    <head>
        <title>Registion form</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="bg"></div>
        <section class="registration">
            <div class="regform">
                <?php
                if($success){
                echo "<div style='text-align:center;height:30px;width:100%;color: #009900;font-size:1em; '>
                        <h3>Registration <strong>Success</strong></h3>
                    </div>";
                }
                else if($showerror){
                    echo "<div style='text-align:center;height:30px;width:100%;color: red;font-size:1em; '>
                    <h3>Username already exists</h3>
                </div>" ;
                }
                
                ?>
                <form method="POST">
                    <div class="Registration-heading">
                        <h2>Register</h2>
                    </div>
                    <div class="reg-input">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="Username" required>
                    </div>
                    <div class="reg-input">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="birthday-input">
                        <label for="birthdat">Date-of-Birth</label>
                        <input type="date" id="birthday" name="birthday" required>
                    </div>
                    <div class="security-question">
                        <label for="security-question">Security-Question</label>
                        <select name="security-question" id="security-question" name="security-question" required>
                            <option value="fav-color">What's Your Favourite color</option>
                            <option value="fav-pet">What's Your Favourite Pet</option>
                            <option value="fav-dish">What's Your Favourite Dish</option>
                        </select>
                    </div>
                    <div class="reg-input">
                        <label for="security-answer">Security-Answer</label>
                        <input type="text" id="security-answer" name="security-answer" required>
                    </div>
                    <div class="reg-input">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="reg-submit">
                        <input type="Submit" value="Register">
                    </div>
                    <a href="index.php"> Go to Login Page?</a>
            </form>
            </div>
        </section>
    </body>
</html>

