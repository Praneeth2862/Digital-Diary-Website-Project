<?php
require('connection.php');
session_start();
if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
}
else{
    header('index.php');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    
    <title>Past Entries</title>

    <style>
        .image{
            position: fixed;
            z-index:-1;
    width:100%;
    height:100vh;
    background-image: url("wood.jpg");
    background-position: center;
    background-size: cover;
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
    <div class="image"></div>
  <section class="pastentries">
  <div class="bun">
        <a href="welcomepage.php">Go Home</a>
    </div>
            <div class="table-content">
                <?php
                    $sql = "SELECT * FROM entries where username='$username'";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0) {
                        echo "<table class='table table-bordered table-light' ";
                        echo "<thead class='thead-'><tr><th>Sno</th><th>Username</th><th>Date</th><th>Entry Title</th><th>Actions</th></tr></thead>";
                        $sno=0;
                        while($row = mysqli_fetch_assoc($result)) {
                            $sno=$sno+1;
                            echo "<tr>";
                            echo "<td>"."<h5>".$sno."</h5>"."</td>";
                            echo "<td>"."<h5>". $row['username'] ."</h5>". "</td>";
                            echo "<td>" ."<h5>". $row['date'] . "</h5>"."</td>";
                            echo "<td>" . "<h5>".$row['title'] ."</h5>". "</td>";
                            echo "<td>"."<a class='btn btn-primary'  href='viewentry.php?id=" . $row['eid'] . "'>View</a>      <a class='btn btn-primary' href='deleteentry.php?id=" . $row['eid'] . "'>Delete</a>"."</td>";
                            

                            echo "</tr>";
                        }
                        echo "</table>";
                        
                    } else {
                        echo "<center>"."<h1>"."No entries found."."</h1>"."<center>";
                    }
                ?>


            </div>
        </section>
        







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

