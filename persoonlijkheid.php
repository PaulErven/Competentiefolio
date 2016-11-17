<?php

session_start();
if(isset($_SESSION['login_user'])){

include('main.php');
}else{
    header("location: login.php");
}

?>

<div id="content">
<h1>Persoonlijkheid</h1>
<p>In dit onderdeel staat de bewustwording van uw wensen, 
mogelijkheden en vaardigheden centraal. Deze zijn onlosmakelijk verbonden met uw persoonlijkheid. 
Dat gebeurt door middel van een aantal testen. 
Onder het kopje 'Tips' vindt u aanwijzingen hoe u de testuitslagen moet opslaan om deze later te kunnen opnemen in uw Ervaringsdossier. Als u het interessant vindt om daarnaast nog andere testen te maken, bijvoorbeeld om de uitkomsten te kunnen vergelijken, dan vindt u hier ook enkele verwijzingen naar andere websites.</p>
<h1>Persoonskenmerken</h1>
<p>De testen in dit onderdeel geven inzicht in hoe u als mens omgaat met zaken die betrekking hebben op werksituaties. Ieder mens is uniek en de combinatie van kenmerken bepaalt mede in welke werksituaties u volledig tot uw recht zult komen.Vul de vragenlijsten in bij de onderstaande links 'Loopbaanspiegel' en 'CAPAZ-werk' en lees voordat u begint onder het kopje 'Tips' hoe u de testresultaten moet opslaan. Let op: u kunt deze testen maar &eacute;&eacute;n keer maken.</p>

<a href="\ph\loopbaanspiegel.php">Klik hier om verder te gaan</a>



</div>

