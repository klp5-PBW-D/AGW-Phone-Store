<?php

require('../function.php');

$userData = query("SELECT
                        a.id,
                        a.username,
                        b.NAME roles 
                    FROM
                        users a
                        INNER JOIN roles b ON a.role_id = b.id");

function getUser($idUser)
{
    $data=query("SELECT
                    a.id,a.username,a.`password`,b.`name` as role
                FROM
                    users a INNER JOIN roles b ON a.role_id = b.id
                WHERE
                    a.id = $idUser")[0];
    return $data;
}

function tambahUser($data)
{
    global $conn;
    $username = mysqli_escape_string($conn, $data['username']);
    $roles = htmlspecialchars($data['roles']);

    // enkripsi password
    $password = password_hash($data['password'], PASSWORD_DEFAULT);
    // enksripsi password end

    $query = "INSERT INTO users ( username, password, role_id )
                 VALUES
                    ('$username','$password',$roles);";
    $result = mysqli_query($conn, $query) or var_dump(mysqli_error($conn));
    $hasil = mysqli_affected_rows($conn);
    return $hasil;
}

function updateUser($data)
{
    global $conn;
    $idUser = htmlspecialchars($data['idUser']);
    $username = mysqli_escape_string($conn, $data['username']);
    $roles = htmlspecialchars($data['roles']);

    if (checkUsername($username)) {
        // enkripsi password
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        // enksripsi password end

        $query="UPDATE users
                SET username = '$username',
                password = '$password',
                role_id = '$roles'
                WHERE
                    id = $idUser;";
        $result = mysqli_query($conn, $query) or var_dump(mysqli_error($conn));
        $hasil = mysqli_affected_rows($conn);
        return $hasil;
    } else {
        return -1;
    }
}


function hapus($id)
{
    global $conn;
    $result = mysqli_query($conn, "DELETE FROM users WHERE id=$id");
    $hasil = mysqli_affected_rows($conn);
    return $hasil;
}

function checkUsername($data)
{
    global $conn;
    $username = mysqli_escape_string($conn, $data);
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($result)==0) {
        return true;
    } else {
        return false;
    }
}
