<?php
require('../function.php');


// Data table
    $dataList = query("SELECT
                            a.id,
                            a.date,
                            b.name,
                            a.quantity,
                            a.each_price,(
                                a.quantity * a.each_price 
                                ) AS total,((
                                    a.quantity * a.each_price 
                                    )-(
                                    b.capital_price * a.quantity 
                                )) AS profit 
                        FROM
                            orders a
                            INNER JOIN products b ON a.product_id = b.id
                        ORDER BY a.date DESC");

// FORM TAMBAH DATA PENJUALAN
// Ambil Nama Produk
    $produk = query("SELECT id,name,stock FROM products WHERE stock>0 ORDER BY name");

// method
function tambahDataPenjualan($data)
{
    global $conn;
    $idOperator = htmlspecialchars($data['idOperator']);
    $tanggal = htmlspecialchars($data['tanggal']);
    $idBarang = htmlspecialchars(explode("-", $data['idBarangBaru'])[0]);
    $qty = htmlspecialchars($data['jumlah']);
    $hargaSatuan = htmlspecialchars($data['hargaBarang']);
    
    $query = "INSERT INTO orders ( product_id, user_id, quantity, each_price, date )
                            VALUES
                            ($idBarang,$idOperator,$qty,$hargaSatuan,'$tanggal')";
    $result = mysqli_query($conn, $query) or var_dump(mysqli_error($conn));
    $hasil = mysqli_affected_rows($conn);
    return $hasil;
}

function hapus($id)
{
    global $conn;
    $result = mysqli_query($conn, "DELETE FROM orders WHERE id=$id");
    $hasil = mysqli_affected_rows($conn);
    return $hasil;
}

// Edit Penjualan
function getPenjualan($idPenjualan)
{
    $getPenjualan = query("SELECT
                                a.id idOrder,
                                a.quantity,
                                a.each_price,
                                a.date,
                                b.id idProduct,
                                b.name,
                                b.stock,
                                c.id idUsername,
                                c.username
                            FROM
                                orders a
                                INNER JOIN products b ON a.product_id = b.id
                                INNER JOIN users c ON a.user_id = c.id
                            WHERE a.id=$idPenjualan")[0];
    return $getPenjualan;
}

function editPenjualan($data)
{
    global $conn;
    $idOrder= htmlspecialchars($data['idOrder']);
    $tanggal= htmlspecialchars($data['tanggal']);
    $idProduct= htmlspecialchars($data['idProduct']);
    $hargaBarang= htmlspecialchars($data['hargaBarang']);
    $newQuantity= htmlspecialchars($data['newQuantity']);
    $query = "  UPDATE orders 
                SET 
                    product_id = $idProduct,
                    date = '$tanggal',
                    each_price = $hargaBarang,
                    quantity = $newQuantity 
                WHERE
                    id = $idOrder";
    $result = mysqli_query($conn, $query) or var_dump(mysqli_error($conn));
    $hasil = mysqli_affected_rows($conn);
    return $hasil;
}
