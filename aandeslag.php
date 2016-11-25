<?php
session_start();
if(isset($_SESSION['login_user'])){

    include('main.php');
    // include(dirname(__DIR__).'\dev\main.php');

}else{
    header("location: login.php");
}

?>
<div id="content">
<h1>Aan de slag</h1><h2>Algemene informatie</h2>
         <p>Deze digitale werkomgeving biedt u de mogelijkheid om uw eigen Ervaringsdossier (EVD) samen te stellen. Met behulp van testen, vragenlijsten en andere hulpmiddelen wordt u door de verschillende onderdelen van het EVD geleid. Wanneer u alle onderdelen heeft afgerond is uw Ervaringsdossier compleet en kunt u dit via de e-coach aanbieden voor certificering. De e-coach beoordeelt het EVD op volledigheid en de opgenomen bewijsstukken worden getoetst aan relevantie, actualiteit, echtheid etc. </p><h2>Uitleg over werkbladen</h2>        <p>Bovenaan ziet u zes werkbladen. In het eerste werkblad staan instrumenten die inzicht bieden in uw persoonskenmerken en wat voor u belangrijke keuzeaspecten zijn in uw loopbaan. In het tweede werkblad gaat u uw competenties onderzoeken en uw competentieprofiel opstellen. Met beroep- en studieori&euml;ntatie gaat u aan de slag in het derde werkblad. Vervolgens maakt u in het vierde werkblad uw Persoonlijk Ontwikkel/actieplan of een Van Werk naar Werk Plan. Het vijfde werkblad is bedoeld om u te helpen een goed CV samen te stellen.Tenslotte voegt u in het werkblad Ervaringsdossier de door u verzamelde documenten en bewijsstukken samen in uw persoonlijke Ervaringsdossier (EVD). Hiervoor is een voorblad en inhoudsopgave bijgevoegd.</p>
</div>