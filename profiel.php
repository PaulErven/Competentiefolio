<?php

session_start();
include('helper.php');
if(isset($_SESSION['login_user'])){
$db = new \dataAccess();
$datumfunc = new \datum();
include('main.php');
}else{
    header("location: login.php");
}
$gebruiker = $_SESSION['login_user'];

$inloguser = $_SESSION['UserId'];

$profiel = $db->laad_profiel($inloguser);

if ($profiel["Geslacht"] == 'V'){
    $geslacht = 'Vrouw';
} else {
    $geslacht = 'Man';
}

// Maak een leesbare datum
$gebdat = $datumfunc->leesbaredatum($profiel["GeboorteDatum"]);
?>

<section id="content" >
    <h1>Profiel</h1>
    Naam:  <?php echo $profiel["Voornaam"] . " ". $profiel["Naam"] ?></br>
    Email: <?php echo $profiel["EmailAdres"]  ?>  </br>
    Geslacht: <?php echo $geslacht?> </br>
    Geboortedatum: <?php echo $gebdat?> </br>
    Soort gebruiker: <?php echo $profiel["SoortUser"]?> </br>
</section>