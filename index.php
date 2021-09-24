<?php

if(isset($_POST['name'])){
$insert=false;
$server="localhost";
$username="root";
$password="";


$con = mysqli_connect($server,$username,$password);
if(!$con){
    die("connection to database is failed due to ".mysqli_connect_error());
}
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];
// echo"database is successfully connected ";
$sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
// echo $sql;
if($con->query($sql) == true){
    // echo"successful inserted";
    $insert=true;
}
else{
    echo"ERROR : $sql <br> $con->error";
}
$con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel FORM</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bonheur+Royale&family=Italianno&family=Titillium+Web:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="TCET">
    <div class="container">
    <h3>Welcome to TCET  US trip form</h3>
    <p>Enter your details and submit your detail to confirm your participation in the trip</p>
    <?php
    if($insert == true){
    echo"<p class='submitMsg'>Thanks for submitting form !</p>";
    }
    ?>
    <form action="index.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter your name">
        <input type="text" name="age" id="age" placeholder="Enter your age">
        <input type="text" name="gender" id="gender" placeholder="Enter your gender">
        <input type="email" name="email" id="email" placeholder="Enter your email">
        <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
        <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information"></textarea>
        <button class="btn">Submit</button>
       
    </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>