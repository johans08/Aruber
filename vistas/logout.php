<?php

session_start();

unset($_SESSION['usuario']);
unset($_SESSION['tipo']);

session_destroy();

header('Location: ./login.php');