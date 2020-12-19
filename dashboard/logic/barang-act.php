<?php
require('../function.php');

// Total Barang
$dataJumlahBarang = query("SELECT
                                COUNT(*) AS total 
                            FROM
                                products a;")[0];

// Jumlah Modal Belum Keluar
$jumlahModal = query("SELECT
                        sum( capital_price * stock ) AS total 
                    FROM
                        products 
                    ORDER BY
                        id;")[0];

// Jumlah Handphone
$dataJumlahHandphone = query("SELECT
                                SUM(a.stock) AS total 
                            FROM
                                products a
                                INNER JOIN categories b ON a.category_id = b.id 
                            WHERE
                                b.NAME = 'Handphone' 
                                AND a.stock > 0;")[0];

// Jumlah Aksesoris
$dataJumlahAksesoris = query("SELECT
                                    SUM(a.stock) AS total
                                FROM
                                    products a
                                    INNER JOIN categories b ON a.category_id = b.id 
                                WHERE
                                    b.name = 'Aksesoris' AND a.stock>0;")[0];

// Data Barang
$dataBarang = query("SELECT
                        a.id,
                        a.NAME AS nama,
                        a.stock AS stock,
                        c.NAME AS kategori,
                        b.NAME AS supplier,
                        a.capital_price AS modal 
                    FROM
                        products a
                        INNER JOIN suppliers b ON a.supplier_id = b.id
                        INNER JOIN categories c ON a.category_id = c.id
                        ORDER BY a.name;");
// =====================TAMBAH BARANG=========================
// Data Kategori
$dataKategori = query("SELECT * FROM categories;");
// Data Supplier
$dataSupplier = query("SELECT * FROM suppliers;");
function tambahBarang($data)
{
    global $conn;
    $tanggalBarang = htmlspecialchars($data['tanggalBarang']);
    $namaBarang = htmlspecialchars($data['namaBarang']);
    $kategoriBarang = htmlspecialchars($data['kategoriBarang']);
    $supplierBarang = htmlspecialchars($data['supplierBarang']);
    $hargaModal = htmlspecialchars($data['hargaModal']);
    $jumlahBarang = htmlspecialchars($data['jumlahBarang']);

    $query = "INSERT INTO products(name,supplier_id,category_id,stock,capital_price,date) VALUES
                ('$namaBarang',$supplierBarang,$kategoriBarang,$jumlahBarang,$hargaModal,'$tanggalBarang')";
    $result = mysqli_query($conn, $query) or var_dump(mysqli_error($conn));
    $hasil = mysqli_affected_rows($conn);
    return $hasil;
}

function hapusBarang($id)
{
    global $conn;
    $result = mysqli_query($conn, "DELETE FROM products WHERE id=$id");
    $hasil = mysqli_affected_rows($conn);
    return $hasil;
}
// =====================TAMBAH BARANG END=========================



// =====================EDIT BARANG=========================
function getBarang($idBarang)
{
    $data=query("SELECT
                    id,
                    name,
                    supplier_id,
                    category_id,
                    capital_price,
                    stock 
                FROM
                    products 
                WHERE
                    id = $idBarang
                ")[0];
    return $data;
}

function updateBarang($data)
{
    global $conn;
    $idBarang = htmlspecialchars($data['idBarang']);
    $namaBarang = htmlspecialchars($data['namaBarang']);
    $kategoriBarang = htmlspecialchars($data['kategoriBarang']);
    $supplierBarang = htmlspecialchars($data['supplierBarang']);
    $hargaModal = htmlspecialchars($data['hargaModal']);
    $stock = htmlspecialchars($data['jumlahBarang']);
    $query="UPDATE products 
            SET name = '$namaBarang',
            supplier_id = $supplierBarang,
            category_id = $kategoriBarang,
            capital_price = $hargaModal,
            stock = $stock
            WHERE
                id = $idBarang;";
    $result = mysqli_query($conn, $query) or var_dump(mysqli_error($conn));
    $hasil = mysqli_affected_rows($conn);
    return $hasil;
}
// =====================EDIT BARANG END=========================
