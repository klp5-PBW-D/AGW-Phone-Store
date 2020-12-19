<?php
require('../function.php');
// Data Supplier
$dataSupplier = query("SELECT * FROM suppliers;");

function tambahSupplier($data)
{
    global $conn;
    $namaSupplier = htmlspecialchars($data['namaSupplier']);
    $alamatSupplier = htmlspecialchars($data['alamatSupplier']);

    $query = "INSERT INTO suppliers(name,address) VALUES ('$namaSupplier','$alamatSupplier');";
    $result = mysqli_query($conn, $query) or var_dump(mysqli_error($conn));
    $hasil = mysqli_affected_rows($conn);
    return $hasil;
}

function getSupplier($idSupplier)
{
    $data=query("SELECT
                    id,
                    name,
                    address
                FROM
                    suppliers
                WHERE
                    id = $idSupplier
                ")[0];
    return $data;
}

function updateSupplier($data)
{
    global $conn;
    $idSupplier = htmlspecialchars($data['idSupplier']);
    $namaSupplier = htmlspecialchars($data['namaSupplier']);
    $alamatSupplier = htmlspecialchars($data['alamatSupplier']);
    $query="UPDATE suppliers 
            SET name = '$namaSupplier',
            address = '$alamatSupplier'
            WHERE
                id = $idSupplier;";
    $result = mysqli_query($conn, $query) or var_dump(mysqli_error($conn));
    $hasil = mysqli_affected_rows($conn);
    return $hasil;
}


function hapusSupplier($id)
{
    global $conn;
    $result = mysqli_query($conn, "DELETE FROM suppliers WHERE id=$id");
    $hasil = mysqli_affected_rows($conn);
    return $hasil;
}
