<?php

$content="Inloggen";

session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Gebruikersnaam of wachtwoord is onjuist";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect('ervenonline.info:32600','paul','flush*3','Competentiefolio');
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($connection,$username);
$password = mysqli_real_escape_string($connection,$password);
// Selecting Database

// SQL query to fetch information of registerd users and finds user match.

$sql = "select * from Users where Pw='$password' AND Name='$username'";
$result = $connection->query($sql);
$rows = mysqli_num_rows($result);

if ($rows == 1) {
$row=$result->fetch_assoc();
$_SESSION['login_user']=$username; 
$_SESSION['UserId']=$row['UserId'];
$_SESSION['Password']=$row['Pw'];

} else {
$error = "Gebruikersnaam of wachtwoord is onjuist";
}

mysqli_close($connection); // Closing Connection
}
}

include ('main.php');

if(isset($_SESSION['login_user'])){
header("location: voortgang.php");
}
?>

<section id="login" class="modallogin">
<div class="modallogin-content">
    <h1>Inloggen</h1>
        <form action="" method="post">
            <label>Gebruikersnaam :</label>
            <input id="name" name="username" placeholder="Gebruikersnaam" type="text"></br>
            <label>Wachtwoord : </label>
            <input id="password" name="password" placeholder="**********" type="password">
            <input name="submit" type="submit" value=" Login "></br>
            <span><h4><?php echo $error; ?></h4></span></br>
            <span>Als u zich wilt aanmelden, klik dan  <a href ="intake.php">hier</a></span>
        </form>
    </div>
</section>
