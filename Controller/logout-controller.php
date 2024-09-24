<?php

    session_start();
    session_destroy();
    
    setcookie("id","",time()-100000000,"/");
    setcookie("flag","",time()-100000000,"/");
    header("location:../View/sign-in.php");
    
?>