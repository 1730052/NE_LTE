<?php
    // Remueve todas las variables de la sesion
    session_unset();
    session_destroy();

    header('Location: ../index.php');

?>
