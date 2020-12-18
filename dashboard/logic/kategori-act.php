<?php
require('../function.php');
// Data Kategori
$dataKategori = query("SELECT * FROM categories;");
function tambahKategori($data)
{
    global $conn;
    $namaKategori = htmlspecialchars($data['namaKategori']);
    $query = "INSERT INTO categories(name) VALUES ('$namaKategori');";
    $result = mysqli_query($conn, $query) or var_dump(mysqli_error($conn));
    $hasil = mysqli_affected_rows($conn);
    return $hasil;
}

function getKategori($idKategori)
{
    $data=query("SELECT
                    id,
                    name
                FROM
                    categories
                WHERE
                    id = $idKategori
                ")[0];
    return $data;
}

function updateKategori($data)
{
    global $conn;
    $idKategori = htmlspecialchars($data['idKategori']);
    $namaKategori = htmlspecialchars($data['namaKategori']);
    $query="UPDATE categories 
            SET name = '$namaKategori'
            WHERE
                id = $idKategori;";
    $result = mysqli_query($conn, $query) or var_dump(mysqli_error($conn));
    $hasil = mysqli_affected_rows($conn);
    return $hasil;
}



function hapusKategori($id)
{
    global $conn;
    $result = mysqli_query($conn, "DELETE FROM categories WHERE id=$id");
    $hasil = mysqli_affected_rows($conn);
    return $hasil;
}
