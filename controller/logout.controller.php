<?php
session_start();
session_unset();
session_destroy();

// Volver a la pagina principal
header("location: ../index.php?error=none");