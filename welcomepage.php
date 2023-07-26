<?php
session_start();
if(!isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==false){
    header("location:index.php");
}
?>
<html>
    <head>
        <title>Welocome</title>
        <link rel="stylesheet" href="styles.css">
        <body>
            <div class="welcome-img"></div>
            <div class="welcome-content">
                <div class="content-box">
                    <h2>Welcome <span>
                        <?php echo $_SESSION['username']?>
                    </span></h2>
                    <button onclick="window.location.href='diarypage.php'">New Entry</button>
                    <button onclick="window.location.href='pastentries.php'">Past Entries</button>
                    <button class="signout" onclick="window.location.href='signout.php'">Signout</button>
                </div>
            </div>
        </body>
    </head>
</html>