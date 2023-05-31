<?php

session_start();
session_destroy(); //destruimos la sesión y le mandamos al index.php

header("Location: ../../index.php");

?>