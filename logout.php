<?php
//dette er logout knappen, den dreper session, sånn at vi unngår å
//bruke opp en av database koblingene våre på det.  
session_start();

if (isset($_SESSION))
{
    session_destroy();
}
header("Location: index.php");

?>