<?php

function scores()
{
    $con1=false;
    $con2=false;
    $con3=false;
    $con4=false;

    // mockup
    $catids = array(60,59,62);
    $catscores = array(23,23,25);

    foreach ($catids as $catid) {
        for ($j=0; $j<count($catscores); $j++) {
            if ($catid==59 && $catscores[$j]>=23) {
                $con1=true;
                break;
            }
            if ($catid==62 && $catscores[$j]>=25) {
                $con2=true;
                break;
            }
            if ($catid==61 && $catscores[$j]>=23) {
                $con3=true;
                break;
            }
            if ($catid==60 && $catscores[$j]>=22) {
                $con4=true;
                break;
            }
        }
    }
    $result='';
    if ($con1 && $con2) {
        $result .= 'doener';
        $doener=true;
    }
    if ($con2 && $con3) {
        $result .= 'beslisser';
        $beslisser=true;
    }
    if ($con3 && $con4) {
        $result .= 'denker';
        $denker=true;
    }
    if ($con4 && $con1) {
        $result .= 'bezinner';
        $bezinner=true;
    }
    return    $result;
}
?>

<!DOCtype html>
<head>
</head>


<body>

<h1>Scorestest</h1>

<?php echo scores() ?>


</body>
</html>
