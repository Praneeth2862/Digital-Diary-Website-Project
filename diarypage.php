
<?php
session_start();
require('connection.php');
if(!isset($_SESSION['username'])){
    header('index.php');
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    echo"yess";
    $entry=$_POST["textarea1"];
    $username=$_SESSION['username'];
    $title=$_POST['title'];
    $formatted_entry = nl2br(htmlspecialchars($entry));
    $sql="INSERT INTO entries(username,entry,title) VALUES('$username','$formatted_entry','$title')";
    $result=mysqli_query($conn,$sql);
    if($result){
        header("location:diarypage.php");
    }
}
?>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diary Page</title>
    <!-- CSS StyleSheet Link -->
    <link rel="stylesheet" href="diarystyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        .submit{
            display:flex;
            justify-content: space-between;
            width:100%;
            margin-bottom:5px;
        }
        .submit input{
            padding:10px;
            font-size:1em;
            background-color:black;
            font-weight:bold;
            color:white;
            border:none;
            cursor:pointer;
        }
        .submit input:hover{
            background-color:white;
            color:black;
        }
        .date{
            display:inline;
            font-size:25px;
            color:black;
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
<body bg color="red">
    <div class="bun">
        <a href="welcomepage.php">Go Home</a>
    </div>
    <form method="POST"> 
        <div class="submit">
            <input type="submit" value="Save Entry">
            <div class="date">
            <?php
            echo date("l jS \of F Y ") 
            ?>
        </div>
        </div>
        <section>   
            <div class="content-title">
                <h2>Todays's Title :)</h2>
                <textarea class="title" name="title" id="title" cols="20" rows="1" required></textarea>
            </div>
                <div class="row">
                    <div class="col">
                        <div class="first box">
                            <input id="font-size" type="number" value="16" min="1" max="100" onchange="f1(this)">
                        </div>
                        <div class="second box">
                            <button type="button" onclick="f2(this)">
                                <i class="fa-solid fa-bold"></i>
                            </button>
                            <button type="button" onclick="f3(this)">
                                <i class="fa-solid fa-italic"></i>
                            </button>
                            <button type="button" onclick="f4(this)">
                                <i class="fa-solid fa-underline"></i>
                            </button>
                        </div>
                        <div class="third box">
                            <button type="button" onclick="f5(this)">
                                <i class="fa-solid fa-align-left"></i>
                            </button>
                            <button type="button" onclick="f6(this)">
                                <i class="fa-solid fa-align-center"></i>
                            </button>
                            <button type="button" onclick="f7(this)">
                                <i class="fa-solid fa-align-right"></i>
                            </button>
                        </div>
                        <div class="fourth box">
                            <button type="button" onclick="f8(this)">aA</button>
                            <button type="button" onclick="f9()">
                                <i class="fa-solid fa-text-slash"></i>
                            </button>
                            <input type="color" onchange="f10(this)">
                        </div>
                    </div>
                </div>
                <br>
                    <div class="row1">
                            <div class="col">
                                <textarea class="main" id="textarea1" name="textarea1" placeholder="Your text here " ></textarea>
                            </div>
                    </div>
        </section>
    </form>
            
        

    <script src="script.js"></script>
</body>

</html>