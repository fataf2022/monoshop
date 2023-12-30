<?php
session_start();
if(isset($_SESSION['SKDJNF?FFJIGNF?K'])){
    $_SESSION['SKDJNF?FFJIGNF?K']=  array();

      
    session_destroy();
    header("Location: ../");
}

else
header("Location: ../login.php");




?>