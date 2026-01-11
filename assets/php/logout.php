<?php
    session_start();
    
    session_unset();
    session_destroy();

    // Redirect to the project home page (two levels up from assets/php/)
    header("Location: ../../");
    exit();
?>