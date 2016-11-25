<?php
    session_start();
    include('helper.php');
if (isset($_SESSION['login_user'])) {
    include('main.php');
} else {
    header("location: login.php");
}

$db = new \dataAccess();
$profiel = $db->laad_profiel($_SESSION['UserId']);


?>
<section id="content">

<h1>Voortgang</h1>
<h2>Welkom <?php echo $profiel["Voornaam"] ?></h2>


</section>