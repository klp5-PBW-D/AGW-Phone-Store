<?php

// -----------------------Global Function Query-----------------------
    // memulai koneksi database
    define("DB_HOST", "153.92.10.74");
    define("DB_USER", "u5030462_project-pbw");
    define("DB_PASSWORD", "project-pbw");
    define("DB_DATABASE", "u5030462_project-pbw");

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

    // check koneksi
    if (!$conn) {
        die("Koneksi gagal : ".mysqli_connect_error());
    }

    // function mengambil query khusus select from
    function query($query)
    {
        global $conn;
        $result = mysqli_query($conn, $query) or die("Error Query : ".mysqli_error($conn));
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[]=$row;
        }
        return $rows;
    }
    // -----------------------END Global Function Query-----------------------

    // -----------------------Login Function-----------------------

    // ambil username dan password secure dari input
    function getUserPass($var)
    {
        global $conn;

        return mysqli_real_escape_string($conn, $var);
    }

    // function check login
    function checkLogin($username, $password)
    {
        global $conn;

        $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'") or die("Error Check Login : ".mysqli_error($conn));
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['password'])) {
                $return = [];
                $return['id'] = $row['id'];
                $return['username'] = $row['username'];
                $return['role'] = $row['role_id'];
                return $return;
            }
        }
        return false;
    }
    // -----------------------END Login Function-----------------------
