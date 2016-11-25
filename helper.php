<?php
    include 'PHPmailer/class.phpmailer.php';
    include 'PHPmailer/class.smtp.php';




// Helper code
function Guid()
{
    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}
class UserInfo
{
    public $naam;
    public function setNaam($naam)
    {
        $this->naam = $naam;
    }
    public function getNaam()
    {
        return $this->naam;
    }
    public $voornaam;
    public function setVoorNaam($voornaam)
    {
        $this->voornaam = $voornaam;
    }
    public function getVoorNaam()
    {
        return $this->voornaam;
    }
    public $emailadres;
    public function setEmailAdres($emailadres)
    {
        $this->emailadres = $emailadres;
    }
    public function getEmailAdres()
    {
        return $this->emailadres;
    }
    public $geslacht;
    public function setGeslacht($geslacht)
    {
        $this->geslacht = $geslacht;
    }
    public function getGeslacht()
    {
        return $this->geslacht;
    }
    public $geboortedatum;
    public function setGeboorteDatum($geboortedatum)
    {
        $this->geboortedatum = $geboortedatum;
    }
    public function getGeboorteDatum()
    {
        return $this->geboortedatum;
    }

    public $soortuser;
    public function setSoortUser($soortuser)
    {
        $this->soortuser = $soortuser;
    }
    public function getSoortUser()
    {
        return $this->soortuser;
    }
}
function melding($melding)
{
    // Eerst ongewenste tekens vervangen
    $melding = str_replace('\'', '"', $melding);
    echo "<script>";
    echo "\$(function(){";
    echo "\$( 'p:last' ).html(' {$melding} ');";
    echo "\$('#melding').modal({backdrop: 'static'});";
    echo "});";
    echo "</script>";
}

class dataAccess
{
    var $servername = "ervenonline.info:32600";
    var $username = "paul";
    var $password = "flush*3";
    var $dbname = "Competentiefolio";
     
    function write_userinfo($userinfo)
    {
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        $guid = Guid();
        $sql = "insert into UserInfo (IdUserInfo,Naam,Voornaam,Emailadres,Geslacht,GeboorteDatum,SoortUser)    VALUES ('{$guid}','{$userinfo->naam}','{$userinfo->voornaam}','{$userinfo->emailadres}','{$userinfo->geslacht}','{$userinfo->geboortedatum}','{$userinfo->soortuser}')";
        $sqlResult = true;
        $sqlResult = mysqli_query($conn, $sql);
        // or melding(mysqli_error($conn));
        if ($sqlResult == false) {
            melding(mysqli_error($conn));
            mysqli_close($conn);
        } else {
            mysqli_close($conn);
        }
        return $sqlResult;
    }

    function write_documentMeta($idUserInfo,$DocNaam,$DocSoort,$DocType){
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        $DocId = Guid();
        $DocDatumTijd = date("Y-m-d H:i:s");
        $sql = "insert into Documenten (DocId,idUserInfo,DocNaam,DocSoort,DocDatumTijd,DocType) VALUES 
                ('{$DocId}','{$idUserInfo}','{$DocNaam}','{$DocSoort}','{$DocDatumTijd}','{$DocType}')";
        $sqlResult = true;
        $sqlResult = mysqli_query($conn, $sql);
        // or melding(mysqli_error($conn));
        if ($sqlResult == false) {
            melding(mysqli_error($conn));
            mysqli_close($conn);
        } else {
            mysqli_close($conn);
        }
        return $sqlResult;
    }

    function ReadDocPerUser($idUserInfo){
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "SELECT substring_index(Documenten.DocNaam,'_',-1) as DocNaam, 
                DocSoorten.DocSoortNaam, Documenten.DocDatumTijd,Documenten.DocType
                FROM Documenten
                left join DocSoorten
                on Documenten.DocSoort=DocSoorten.DocSoortId
                WHERE idUserInfo = '{$idUserInfo}'
                ORDER BY Documenten.DocDatumTijd DESC";
        $result = mysqli_query($conn,$sql);
        return $result;

    }

    function check_email($userinfo)
    {
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "select emailadres from UserInfo where emailadres = '{$userinfo->emailadres}'";
        $result = mysqli_query($conn, $sql);
        return mysqli_num_rows($result);
    }

    function laad_SoortCodes(){
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "select * from DocSoorten";
        $result = mysqli_query($conn,$sql);
        return $result;
    }

    function laad_profiel($UserId)
    {
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "select * from UserInfo where InlogUser =  '{$UserId}'";
        $result = mysqli_query($conn, $sql);
        return $result->fetch_assoc();
    }

    function MaakUser($email, $pw)
    {
        $guid = Guid();
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "insert into Users (UserId,Name,Pw) VALUES ('{$guid}','{$email}','{$pw}') ";
        $sqlResult=true;
        $sqlResult = mysqli_query($conn, $sql);
        if ($sqlResult == false) {
            melding(mysqli_error($conn));
            mysqli_close($conn);
        } else {
            // Koppel User aan UserInfo
            $sql =  "update UserInfo set InlogUser = '{$guid}' where EmailAdres = '{$email}'";
            $sqlResult=true;
            $sqlResult = mysqli_query($conn, $sql);
           
            mysqli_close($conn);
        }
        return $sqlResult;
    }
}
class mail
{
    function sendInlog($email, $pw)
    {
        $bericht = "Uw gebruikersnaam is: " . $email . "\r\n Uw wachtwoord is: " . $pw;
        
        $mail = new PHPmailer(true);
        $mail->IsSMTP();
        $mail->SMTPDebug  = 0;                     // Turn ON voor Debug
        $mail->SMTPAuth   = true;                  // Moet altijd aanstaan
        $mail->Host       = "mail.competentiefolio.nl";
        $mail->Port       = 587;
        $mail->Username   = 'info@competentiefolio.nl';
        $mail->Password   = 'Royal*9';
        /*/  /*/
        // Hieronder kan een alternatief email adres worden ingevuld zoals een gmail adres of live etc
        $mail->AddAddress($email); //  indien een ander adres vul dan het volgende in tussen de ()    "Hieruwalternatief@mail.adres"
        
        $mail->SetFrom('info@competentiefolio.nl');
        
        $mail->Subject = 'Uw aanmelding';  // pakt het onderwerp van het formulier
        $mail->MsgHTML($bericht); // Pakt het bericht
        $mail->Send();  // Verzend
    }
}

class password
{
    function createInitialPassword()
    {
        $alphabet = 'abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ123456789';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
}

class datum{
    function leesbaredatum($datum){
        return date_format(date_create($datum),'d-m-Y');
    }
}
