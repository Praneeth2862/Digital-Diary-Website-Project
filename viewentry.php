<?php
require('connection.php');
session_start();
if(!isset($_SESSION['username'])){
    header('location:index.php');
}
$entry_id=$_GET['id'];
$sql="SELECT * from entries WHERE eid='$entry_id'";
$result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
    <style>
        .view-img{
    position:absolute;
    width:100%;
    height:100vh;
    background-image: url("plain-board.jpg");
    background-position: center;
    background-size: cover;
    z-index:-1;
}
.view-content{
    display:flex;
    align-items:center;
    justify-content:center;
}
.content{
    width:700px;
    height:600px;
    background-color:white;
    border:2px solid;
}
.title-heading{
    color:red;
    font-size:2.5em;
    text-decoration:underline;
}
.date{
    font-size:1.5em;
    color:black;
    font-weight:bold;
    margin-top:30px;
    margin-left:40px;
}
.entry{
    margin-top:30px;
    margin-left:60px;
    font-size:1.7em;
    font-weight:bold;
}
.bun{
            position: absolute;
            top:12%;
            left:5%;
            }
        .bun a{
            text-decoration:none;
            padding:15px;
            font-weight:bold;
            color:white;
            background-color: #1a1a1a;
            }
    </style>
</head>
<body>
    <div class="view-img"></div>
    <div class="bun">
        <a href="pastentries.php">Go Back</a>
    </div>
    <section class="view-content">
        <div class="content">
            <?php
                $row=mysqli_fetch_assoc($result);
                echo "<div class='title-heading'>"."<center>".$row['title']."</center>"."</div>";
                echo "<div class='date'>".$row['date']."</div>";
                echo "<div class='entry'>".$row['entry']."</div>";
            ?>
        </div>
    </section>
</body>
</html>