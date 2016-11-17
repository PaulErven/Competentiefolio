<!DOCtype html>
<html>
<head>
    <title>Competentiefolio DEV</title>
    <link href="./styles/stylesMain.css" rel="stylesheet">
    <link href="./styles/styles.css" rel="stylesheet">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script src="./scripts/script.js"></script>
</head>

<body>
    <header id="head" class="headerMain">
        <h1>Competentiefolio</h1>
        <nav id="navigation">
            <ul id="navMain">
                    <li><a href="#">Over ons</a></li>
                    <li><a href="#">Tips</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropbtn">Mijn Account</a>
                            <ul class="dropdown-content">
                                <li><a href="profiel.php">Profiel</a></li>
                                <li><a href="logout.php">Uitloggen</a></li>
                            </ul>
                    </li>
                </ul>
        </nav>
        <script>
            $('#head').fadeIn();
        </script>
    </header>

    <nav id="nav">
        <ul>
            <li><a href="./aandeslag.php"><img src="./images/home.png" alt="home" class="menuimg"   ></a></li>
            <li><a href="./persoonlijkheid.php">Persoonlijkheid</a></li>
            <li>Competenties</li>
            <li>Ambities</li>
            <li>Acties</li>
            <li>CV</li>
            <li>Ervaringsdossier</li>
            <li><a href="voortgang.php">Voortgang</a></li>
        </ul>
    </nav>

    <aside id="sidebar">
        <h4>Voortgangsindicator</h4>
        <p>
            
        </p>
    </aside>

<!-- Modal -->
  <div class="modal fade" id="melding" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:red;">Mededeling</h4>
        </div>
        <div class="modal-body">
            <p id="meldtekst"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default " data-dismiss="modal" data-target="login.php">Ok</button>  
        </div>
      </div>
    </div>
  </div> 

   
</body>
</html>