<?php
    session_start();
    echo "Logging you out. Please wait...";


    session_unset();
    session_destroy();
    
    header("Location: /forum/admin.php");
?>