<?php
    require('init.php');

    if (!isset($_SESSION['login'])) {
        header("Location: login.php");
    } elseif (isset($_SESSION['login'])) {
        header("Location: admin/index.php");
    }
