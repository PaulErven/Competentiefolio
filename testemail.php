<?php
    include ('helper.php');
    include ('main.php');

    $mail = new \mail();

    if (isset($_POST['test'])){
    $mail->sendInlog('p.erven@zuyderland.nl','TESTBERICHT');
    melding('testbericht gestuurd');

}


?>

<section id="content">

<form method="post">
    <input type="submit" name="test" value="test" />
</form>

</section>
