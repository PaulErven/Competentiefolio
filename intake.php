<?php

session_start();
include 'helper.php';
include 'main.php';

$mail = new \mail();
$passw = new \password;
$resultaat = '';
if ($_SERVER['REQUEST_METHOD']=='POST') {                      
    $db = new \dataAccess();
    $mail = new \mail();
    $userinfo = new \UserInfo();
    $userinfo->naam = $_POST["naam"];
    $userinfo->voornaam = $_POST["voornaam"];
    $userinfo->emailadres = $_POST["emailadres"];
    $userinfo->geslacht = $_POST["geslacht"];
    $userinfo->geboortedatum = $_POST["geboortejaar"] . '/' . $_POST["geboortemaand"] .'/' . $_POST["geboortedag"];
    $userinfo->soortuser = "Normaal";

    // Check input
    $error = '';
    if (!checkdate($_POST["geboortemaand"],$_POST["geboortedag"],$_POST["geboortejaar"])){
       $error = $error . 'Datum is niet correct</br>';
    }
    if($db->check_email($userinfo)>=1){
        $error = $error . 'Email adres bestaat al';
    }
    if ($error == ''){
        $resultaat = $db->write_userinfo($userinfo);
        if ($resultaat == true) {
            // Maak wachtwoord
            $password = $passw->createInitialPassword();
            // User aanmaken en koppel aan tabel userinfo
            $resultaat = $db->MaakUser($userinfo->emailadres,$password);
            $melding = '<h1>Gefeliciteerd</h1></br><h4>U heeft zich succesvol aangemeld.</h4></br><p>U ontvangt uw inloggegevens per email.</p>';
            melding($melding);
            // Stuur mail naar de gebruiker
            $resultaat = $mail->sendInlog($userinfo->emailadres,$password);   
        }
    } else
    {
        melding($error);
    }
}



?>

<section id="content">
<h1>Intake</h1>
<h2>Persoonlijke gegevens</h2>

<form action="" method="post" >
    <label>Naam :</label>
    <input id="naam" type="text" name="naam"    required ></br>
    <label>Voornaam :</label>
    <input id="voornaam" name="voornaam"  type="text"  required ></br>
    <label>Geslacht :</label>    
    <select name="geslacht" style="width:70px;">
        <option value="M">Man</option>
        <option value="V">Vrouw</option>
    </select>
    </br>
    <label>Email :</label>
    <input id="email" name="emailadres"  type="email"  required></br>
    <label>Geboortedatum :</label>
    <input id="gedoortedag" name="geboortedag" type="number" class="geboorteinput" min="1" max="31"  required >
    <input id="geboortemaand" name = "geboortemaand" type="number" class="geboorteinput" min="1" max = "12"  required>
    <input id="geboortejaar" name="geboortejaar" type="number" class="geboorteinput" style="width:75px;"  required>
    <input name="submit" name="ok" type="submit" value=" OK "></br>
    
</form>


</section>
