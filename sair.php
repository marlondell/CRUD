<!-- reset na variável global de usuário e volta para página de login -->

<?php
    session_start();
    unset($_SESSION["user_portal"]);
    header("location:login.php");
?>