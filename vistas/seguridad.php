<?php

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
}