<!DOCTYPE html>
<html>

<head>
    <title>Competentiefolio DEV</title>
    <link href="styles/styles.css" rel="stylesheet">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="scripts/script.js"></script>
</head>

<body>
    <header id="head">
        <h1>Competentiefolio</h1>
        <nav id="navigation">
            <ul id="navMain">
                 <li><a href="index.php">Home</a></li>
                 <li><a href="voortgang.php">Voortgang</a></li>
                 <li><a href="login.php">Log In</a></li>
            </ul>

        </nav>
    </header>
    <div id="video" class="fullscreen-bg">
        <video muted loop autoplay  class="fullscreen-bg__video">
            <source src="video/Coverr-office.mp4" >Uw browser ondersteunt geen video
            <source src="video/Coverr-office.webm" >Uw browser ondersteunt geen video
        </video> 
        <script>
              $('#video video').on('play',function(){
                $(this).parent().animate({opacity: 0.6},5000);
                $('.tekstblok').fadeIn();
                 $('#head').fadeIn();
                })
        </script>
    </div>

    <section id="content">
    
    <div class="tekstblok" id="tekst1">
        <h1>Algemene informatie</h1>
        Deze digitale werkomgeving biedt u de mogelijkheid om uw eigen Ervaringsdossier (EVD) samen te stellen. Met behulp van testen,
        vragenlijsten en andere hulpmiddelen wordt u door de verschillende onderdelen van het EVD geleid. Wanneer u alle
        onderdelen heeft afgerond is uw Ervaringsdossier compleet en kunt u dit via de e-coach aanbieden voor certificering.
        De e-coach beoordeelt het EVD op volledigheid en de opgenomen bewijsstukken worden getoetst aan relevantie, actualiteit,
        echtheid etc. Daarna draagt de e-coach zorg voor certificering van uw Ervaringsdossier bij de Open Universiteit Nederland.
    </div>

    <div class = "tekstblok"  id="tekst2" >
        <h1>Uitleg</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nos paucis ad haec additis finem faciamus aliquando; Non quam nostram quidem, inquit Pomponius iocans; Quamquam tu hanc copiosiorem etiam soles dicere. Hoc loco tenere se Triarius non potuit. Egone non intellego, quid sit don Graece, Latine voluptas? </p>
        <p>Itaque rursus eadem ratione, qua sum paulo ante usus, haerebitis. Graecis hoc modicum est: Leonidas, Epaminondas, tres aliqui aut quattuor; Respondent extrema primis, media utrisque, omnia omnibus. In parvis enim saepe, qui nihil eorum cogitant, si quando iis ludentes minamur praecipitaturos alicunde, extimescunt. Item de contrariis, a quibus ad genera formasque generum venerunt. Primum in nostrane potestate est, quid meminerimus? Itaque ad tempus ad Pisonem omnes. </p>
    </div>
    <div class = "tekstblok" id = "tekst3" >
    <h1>Tekstblok 3</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nos paucis ad haec additis finem faciamus aliquando; Non quam nostram quidem, inquit Pomponius iocans; Quamquam tu hanc copiosiorem etiam soles dicere. Hoc loco tenere se Triarius non potuit. Egone non intellego, quid sit don Graece, Latine voluptas? </p>
    </div>
</section>

   


</body>

</html>