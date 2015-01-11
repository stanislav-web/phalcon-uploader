<?php
session_start();
if(file_exists('./vendor/autoload.php'))
    require_once './vendor/autoload.php';
else
    require_once '../../vendor/autoload.php';