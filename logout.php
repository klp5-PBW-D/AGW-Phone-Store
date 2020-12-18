<?php
    require('init.php');

    $_SESSION=[];
    session_destroy();
    session_unset();
    header("Location: index.php");
