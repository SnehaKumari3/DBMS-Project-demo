<?php
    $insert=false;
    $notinsert=false;

    if(isset($_POST['name'])){
        $server="localhost";
        $username="root";
        $password="";

        $con = mysqli_connect($server,$username,$password);
        if(!$con){
            die("connection to this database failed due to ".mysqli_connect_error());
        }
        // echo "success connecting to the database..";

        $name = $_POST['name'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $movie = $_POST['movie'];
        $other = $_POST['other'];


        $sql = "INSERT INTO `booking`.`user` (`name`, `age`, `email`, `phone`, `movie`, `other`, `date`) VALUES ( '$name', '$age', '$email', '$phone', '$movie', '$other',current_timestamp());";

        // echo $sql;

        if($con->query($sql) == true){
            $insert=true;
        }
        else{
            $notinsert=true;
            // echo "Error : $sql <br> $con->error";
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
    <title>Demo Project</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="bg.jpg" alt="no internet" class="bg">
    <div class="container">
        <h1>Welcome to Movie Ticket Booking Site!!</h1>
        <p>
            Enter Your details to confirm your ticket....
        </p>
        <?php
            if($insert == true){
                echo "<p class='success'>
                Thanks for booking your seat. See you at the threature!!
                </p>";
            }
            if($notinsert == true){
                echo "<p class='fail'>
                Oopss...There is some giltch. Please try again!!
                </p>";
            }
        ?>
        <form action="index.php" method="POST">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="age" name="age" id="age" placeholder="Enter Your Age">
            <input type="email" name="email" id="email" placeholder="Enter Your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone">
            <input type="text" name="movie" id="movie" placeholder="Enter The Movie Id">
            <textarea type="text" name="other" id="other" cols="30" rows="10" placeholder="Enter Any Other Information Here..." ></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
    
    
</body>
</html>